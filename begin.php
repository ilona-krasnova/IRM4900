<?php
// include this file at the beginning of each page

// === DEBUGING ===============================================================

// display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// report exeptions
function exception_handler($exception) {
   echo "<pre style='color:red'><b>PHP ERROR: </b>" , $exception, "</pre>";
}
set_exception_handler('exception_handler');

// read db password and api key
include("secret.php");

// var_dump into string
function var_to_string($val) {
    ob_start();
    var_dump($val);
    $string = ob_get_contents();
    ob_end_clean();
    return $string;
}

// log to browser console by writing javasript to html
function console_log($label, $text) {
    $quotes = str_replace("'", "`", $text);
    $spaces = str_replace(array("\n", "        ", "    ", "  "), " ", $quotes);
    echo "<script>console.log('".$label.": ".$spaces."');</script>\n";
    flush();
}

// var dump to console
function console_var($label, $var) {
    console_log($label, var_to_string($var));
}

// === CHAT GPT ===============================================================

// send http post request to chat gpt
function ask_chat_gpt($instructions) {
    global $apiurl, $apikey;
    $instructions = str_replace(array("\n", "\r"), " ", $instructions);
    $instructions = trim($instructions);

    // $model = "gpt-3.5-turbo";
    $model = "gpt-4-1106-preview";
    // $model = "gpt-4";

    // prepare request
    // seed makes chat gpt produce similar output for the same request
    // temperature controls variability
    
    $json = 
'{
    "model": "'.$model.'",
    "messages": [{
        "role": "user",
        "content": "' . str_replace('"', "'", $instructions) . '"
    }],
    "seed": 42,
    "temperature": 0.7
}';
    console_log("GPT REQUEST", $json);

    // http post
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiurl);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json", 
        "Authorization: Bearer " . $apikey
    ));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

    $post_resp = curl_exec($curl);
    curl_close($curl);
    console_log("GPT RESPONSE", $post_resp);

    $reply = json_decode($post_resp);
    if (isset($reply->error)) {
        echo "<pre style='color:red';><b>CHAT GPT ERROR:</b> "
            , str_replace(". ", ".\n", $reply->error->message), "</pre>";
        return false;
    }
    return $reply->choices[0]->message->content;
}

// === DATABASE ===============================================================

// connect to mysql database
function get_connection() {
    global $connection, $servername, $username, $password, $dbname;
    if (!isset($connection)) {
        $connection = new mysqli($servername, $username, $password, $dbname);
        console_log("DATABASE", "opening connection");
    }
    return $connection;
}

// copy database result into array
function result_to_array($result) {
    $resultArray = array();
    while ($row = $result->fetch_assoc()) {
        $resultArray[] = $row;
    }
    return $resultArray;
}

// perform database operation, there may be one, three, or more arguments
// database($sql, $type_str, $param1, %param2);
function database($sql, ...$args) {
    $type_str = count($args) > 0 ? $args[0] : NULL;
    $data_arr = array_slice($args, 1);
    return database_command($sql, $type_str, $data_arr);
}

// perform database operation, 3rd argument must be an array of data
function database_command($sql, $type_str, $data_arr) {
    $conn = get_connection();              // prepare
    $stmt = $conn->prepare($sql);

    if (count($data_arr) > 0) {
        $stmt->bind_param($type_str, ...$data_arr);     
    }    
    $success = $stmt->execute();           // true or false

    $result = $stmt->get_result();         // result data set
    if ($result !== false) {               // select
        $data = result_to_array($result); 
    } else {                               // other operations
        $data = false;
    }
    $last_id = $conn->insert_id;           // auto-incremented id
    $num_rows = $conn->affected_rows;      // number of rows
    $stmt->close();

    console_log(
        "DATABASE",
        "SQL:".$sql." | PAR:".var_to_string($data_arr)." | SUC:".$success
            ." | ID:".$last_id." | NUM:".$num_rows." | RES:".gettype($data)
    );

    if ($success === false) {              // failure
        return false; 
    }
    if ($data !== false) {                 // select
        return $data; 
    }
    if ($last_id !== 0) {                  // insert with auto id
        return $last_id;                   // the first record, if multiple
    }
    return $num_rows;                      // update or delete
}

function close_connection() {
    global $connection;
    if (isset($connection)) {
        $connection->close();
        console_log("DATABASE", "closing connection");
    }
}
?>