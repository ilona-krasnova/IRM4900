<!-- Show this page while processing -->
<html>
<head>
    <title>Rescribe: processing</title>
    <link rel="icon" href="images/icons8-feather-48.png" />
  </head>
   <body>
        <?php include("header.php") ?>
        <pre style="font-size: 200%;">
  
     ^...^      Please wait while I'm processing!
    / o,o \
    |):::(|
  ====w=w===

        </pre>
        <?php include("footer.php") ?>
    </body>
</html>

<?php
include("begin.php");

// Get text from request parameter and clean it up (remove line breaks, etc)
$text = $_REQUEST['text'];
$text = str_replace(array("\n", "\r"), " ", $text);
$text = trim($text);

// Get difficulty level
$difficulty_level = $_REQUEST['level'];

if (empty($text) || empty($difficulty_level)){
    echo "Text and level parameters are required";
    include("end.php");
    exit();
}

// An array of tasks (Chat GPT prompts) based on level
$task_arr = array(
    // 0th element is not used.
    "",
    // simple
    "Write a very short (less then 160 words) summary of the following article. You audience is 1st grade school students. Use clear and simple language, even when explaining complex topics. Bias toward short sentences. Avoid jargon. Don't start with 'Hey kids!' or 'Hey there!'", 
    // medium
    "Write a very short (less then 160 words) summary of the following article. You audience is 4th grade school students. Use clear and simple language, even when explaining complex topics. Bias toward short sentences. Avoid jargon. Don't start with 'Hey kids!' or 'Hey there!'",
    // complex
    "Write a very short (less then 200 words) summary of the following article. You audience is 8th grade school students. Use clear and simple language, even when explaining complex topics. Avoid jargon. Don't start with 'Hey kids!' or 'Hey there!'", 
);

// Create summary
$task1 = $task_arr[$difficulty_level];
$summary = ask_chat_gpt("[".$task1."] ".$text);
console_var("SUMMARY", $summary);

// Create a list of 5 keywords from the original text, delimited by |
$task2 = "Select 5 words (terms) from the following text. Choose the words which may be difficult for children to understand. Explain these words in simple terms. Write each word and its explanation on one line, separating the word and explanation by : symbol, use | symbol at the end of each line.";
$terms = ask_chat_gpt("[".$task2."] ".$text);

// Stop processing if no response from ChatGPT
if ($summary == false || $terms == false) { 
    exit(); 
}

// Split the keyword string into an array based on the pipe character
$terms_array = explode('|', $terms);
$keyword_arr = array();
foreach ($terms_array as $term) {
    // Split each term into key-value pairs based on the colon
    $term_parts = explode(':', $term);
    if (count($term_parts) == 2 ) {
        // Extract name and description
        $row = array();
        $row['name'] = trim($term_parts[0], "\r\n ");
        $row['description'] = trim($term_parts[1], "\r\n ");
        $keyword_arr[] = $row;
    }
}

// prepare list of keyword names as comma-separated string
$keyword_names = "";
foreach ($keyword_arr as $keyword) {
    $keyword_names = $keyword_names."'".$keyword['name']."',";
}
$keyword_names = trim($keyword_names, ",");

// get a list of texts with similar keywords
$number_of_keywords_to_match = 1;
$similar_text_count = database("SELECT text_id, COUNT(*) as cnt FROM text_keyword WHERE name IN (".$keyword_names.") GROUP BY text_id HAVING COUNT(*) > ?", "i", $number_of_keywords_to_match);
console_var("SIMILAR", $similar_text_count);

// find minimal Levenshtein distance
$min_dist = 100.0;
$min_text_id = 0;
foreach($similar_text_count as $text_count) {
    // get text for matching keywords
    $old_text = database("SELECT * FROM text WHERE id = ?", "i", $text_count['text_id'])[0];
    // calculate Levenshtein distance https://en.wikipedia.org/wiki/Levenshtein_distance
    $lev_dist = levenshtein($text, $old_text['original_text']);
    $perc = ($lev_dist * 100.0) / strlen($text);
    console_log("DIST", "".$lev_dist."/".strlen($text)."=".$perc."%");
    // if result is better than the previous, store result and ID
    if ($perc < $min_dist) {
        $min_dist = $perc;
        $min_text_id = $text_count['text_id'];
    }
}
$match = "".round(100.0 - $min_dist, 1);

// if text is less than 10% different, reuse existing summary
$allowed_diff_text_reuse = 10.0;
if ($min_dist < $allowed_diff_text_reuse) {
    // use existing text
    $text_id = $min_text_id; 
}
else {
    // insert new record into text table
    $text_id = database("INSERT INTO text (original_text) VALUES (?)", "s", $text);  // one parameter, "s"-string, "i"-integer, "d"-double, "b"-blob

    // insert each keyword into text_keyword table
    foreach ($keyword_arr as $kw) {
        // console_var("KEYWORD", $kw);
        $keyword_id = database("INSERT INTO text_keyword (text_id, name, description) VALUES (?, ?, ?)", "iss", $text_id, $kw['name'], $kw['description']);
    }
}

// check if a summary for this level already exists
$response_for_level = database("SELECT * FROM response WHERE text_id = ? AND difficulty_id = ?", "ii", $text_id, $difficulty_level);
if (count($response_for_level) > 0) {
    // use existing summary
    $response_id = $response_for_level[0]['id'];
}
else {
    // Store new summary in the database
    $response_id = database("INSERT INTO response (text_id, difficulty_id, summary) VALUES (?, ?, ?)", "iis", $text_id, $difficulty_level, $summary);
}

// Log this request
$timestamp = date('Y-m-d H:i:s');
$request_id = database("INSERT INTO request (response_id, timestamp) VALUES (?, ?)", "is", $response_id, $timestamp);

include("end.php");
?>

<!-- redirect to output page when processing is complete -->
<html>
    <script>
        window.location.href = "output.php?response_id=<?= $response_id ?>&match=<?= $match ?>"
    </script>
    <a href="output.php?response_id=<?= $response_id ?>&match=<?= $match ?>">View Results</a>
</html>