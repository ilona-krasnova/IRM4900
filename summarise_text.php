<html>
<head>
    <title>Processing</title>
  </head>
    <body>
        <pre>

                 ^...^      Processing!
                / o,o \
                |):::(|
                ====w=w===
        </pre>
    </body>
</html>
<?php
include("begin.php");
$num = $_REQUEST['num'] ?? 600;
$text = $_REQUEST['text'];
$difficulty_level = $_REQUEST['level'];

if (empty($text) || empty($difficulty_level)){
    echo "Text and level parameters are required";
    include("end.php");
    exit();
}

$task1 = "Write a very short (less then 160 words) summary of the following article. You audience is 6th grade school students. Use clear and simple language, even when explaining complex topics. Bias toward short sentences. Avoid jargon.";

// $reply = "uncomment the next line of code to call chat gpt";
$reply = ask_chat_gpt("[".$task1."] ".$text);

$task2 = "Select 5 words (terms) from the following text. Choose the words which may be difficult for children to understand. Explain these words in simple terms. Write each word and its explanation on one line, separating the word and explanation by : symbol, use | symbol at the end of each line.";

// $terms = "uncomment the next line of code to call chat gpt";
$terms = ask_chat_gpt("[".$task2."] ".str_replace("\n", " ", $text));

$start = "P%";

// $delete_count = database("DELETE FROM text WHERE CHAR_LENGTH(original_text) < 200");  // no query parameters
// $last_id = database("INSERT INTO text (original_text) VALUES (?)", "s", $reply);  // one parameter, "s"-string, "i"-integer, "d"-double, "b"-blob

$text_id = database("INSERT INTO text (original_text) VALUES (?)", "s", $text);  // one parameter, "s"-string, "i"-integer, "d"-double, "b"-blob
$response_id = database("INSERT INTO response (text_id, difficulty_id, summary) VALUES (?, ?, ?)", "iis", $text_id, 2, $reply);
$result = database("SELECT * FROM text WHERE original_text NOT LIKE ? AND CHAR_LENGTH(original_text) > ?", "si", $start, $num);  // two parameters

$timestamp = date('Y-m-d H:i:s');
$request_id = database("INSERT INTO request (response_id, timestamp) VALUES (?, ?)", "is", $response_id, $timestamp);

// Split the string into an array based on the pipe character
$terms_array = explode('|', $terms);

// Loop through each term
foreach ($terms_array as $term) {
    // Split each term into key-value pairs based on the colon
    $term_parts = explode(':', $term);
    console_var("TERM ERRORS", $term_parts);

    if (count($term_parts) == 2 ) {
        // Extract name and description
        $name = $term_parts[0];
        $description = $term_parts[1];
        $keyword_id = database("INSERT INTO text_keyword (text_id, name, description) VALUES (?, ?, ?)", "iss", $text_id, $name, $description);
    }
}

// $delete_count = database_command("DELETE FROM text WHERE CHAR_LENGTH(original_text) < 200", NULL, array());
// $last_id = database_command("INSERT INTO text (original_text) VALUES (?)", "s", array($reply));
// $result = database_command("SELECT * FROM text WHERE original_text NOT LIKE ? AND CHAR_LENGTH(original_text) > ?", "si", array($start, $num));

// $conn = get_connection();

// $stmt = $conn->prepare("INSERT INTO text (original_text) VALUES (?)");
// $stmt->bind_param('s', $reply); // 'i'-integer, 'd'-double, 's'-string, 'b'-blob
// $success = $stmt->execute();    // true or false
// $last_id = $conn->insert_id;    // get auto-incremented value
// $stmt->close();

// $stmt = $conn->prepare("SELECT * FROM text WHERE CHAR_LENGTH(original_text) > ?");
// $stmt->bind_param('i', $num);
// $stmt->execute();
// $result = result_to_array($stmt->get_result());
// $stmt->close();

include("end.php");
?>

<html>
    <script>window.location.href = "output.php?response_id=<?=$response_id?>"</script>

  <!--
  <body>
    <h3>REQUEST</h3>
    <p><?= $task1 ?></p>

    <h3>RESPONSE</h3>
    <p><?= $reply ?></p>
    <p>( inserted record <?= $text_id ?> , <?= $response_id ?> )</p>

    <h3>TERMS</h3>
    <p><?= str_replace("|", "<br>", $terms) ?></p>

    <h3>DATABASE</h3>
    <p>( LEN > <?= $num ?> )</p>
    <p><?php
        foreach ($result as $row) {
            echo "<p>(".$row["id"].") ".$row["original_text"]."</p>";
        }
    ?></p>
  </body>
  -->
</html>