<?php
include("begin.php");
$num = $_REQUEST['num'] ?? 600;

$task1 = "Write a very short (less then 160 words) summary of the following article. You audience is 6th grade school students. Use clear and simple language, even when explaining complex topics. Bias toward short sentences. Avoid jargon.";

$text = "Language documentation involves recording the speech of native speakers. Transcribing these recordings, which are rich cultural and linguistic resources, is an integral part of the language documentation process. However, transcription is slow: it often takes a linguist between 30 minutes to 2 hours to transcribe and translate a minute of speech, depending on the transcriber’s familiarity with the language and the difficulty of the content. This is a bottleneck in the documentary linguistics workflow: linguists accumulate considerable amounts of speech, but do not transcribe and translate it all, and there is a risk that untranscribed recordings could end up as “data graveyards” (Himmelmann, 2006, 4,12-13). There is clearly a need for “devising better ways for linguists to do their work” (Thieberger, 2016, 92). There has been work on low-resource speech recognition (Besacier et al., 2014), with approaches using cross-lingual information for better acoustic modelling (Burget et al., 2010; Vu et al., 2014; Xu et al., 2016; Müller et al., 2017) and language modelling (Xu and Fung, 2013). However, speech recognition technology has largely been ineffective for endangered languages since architectures based on hidden Markov models (HMMs), which generate orthographic transcriptions, require a large pronunciation lexicon and a language model trained on text. These speech recognition systems are usually trained on a variety of speakers and hundreds of hours of data (Hinton et al., 2012, 92), with the goal of generalisation to new speakers. Since large amounts of text are used for language model training, such systems often do not incorporate pitch information for speech recognition of tonal languages (Metze et al., 2013), as they can instead rely on contextual information for tonal disambiguation via the language model (Le and Besacier, 2009; Feng et al., 2012) even though there is no computational burden in additionally using pitch features. In contrast, language documentation contexts often have just a few speakers for model training and little text for language model training. However, there may be benefit even in a system that overfits to these speakers. If a phonemic recognition tool can provide a canvas transcription for manual correction and linguistic analysis, it may be possible to improve the workflow and leverage of linguists. The transcriptions collected in this semi-automated workflow can then be used for refinement of the acoustic model, leading to a snowball effect of better and faster transcription. In this paper we investigate the application of neural speech recognition models to the task of phonemic and tonal transcription in a language documentation setting where limited resources are available for model training. We use the connectionist temporal classification (CTC) formulation (Graves et al., 2006) for the purposes of direct prediction of phonemes and tones given an acoustic signal, thus bypassing the need for a pronunciation lexicon, language model, and time alignments of phonemes in the training data. By reducing the data requirements we make automatic transcription technology more feasible in a language documentation setting.";

// $reply = "uncomment the next line of code to call chat gpt";
$reply = ask_chat_gpt("[".$task1."] ".$text);

$task2 = "Select 5 words (terms) from the following text. Choose the words which may be difficult for children to understand. Explain these words in simple terms. Write each word and its explanation on one line, separating the word and explanation by : symbol, use | symbol at the end of each line.";

// $terms = "uncomment the next line of code to call chat gpt";
$terms = ask_chat_gpt("[".$task2."] ".str_replace("\n", " ", $reply));

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
  <head>
    <title>Test 3</title>
  </head>
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
</html>
