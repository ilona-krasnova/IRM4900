<?php
// display all errors
function exception_handler($exception) {
   echo "<pre>ERROR:\n" , $exception, "<pre>\n";
   // phpinfo(); 
}
set_exception_handler('exception_handler');

// connect to database
$servername = "sql104.infinityfree.com";
$username = "if0_35369435";
$password = "x1MUb2Zoh9";
$dbname = "if0_35369435_4900";
$conn = new mysqli($servername, $username, $password, $dbname);
$apikey = "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";

$chatgpturl = "https://api.openai.com/v1/chat/completions";
$header1 = "Content-Type: application/json";
$header2 = "Authorization: Bearer " . $apikey;
$json = '{
    "model": "gpt-3.5-turbo",
    "messages": [
      {
        "role": "system",
        "content": "Writing style guideline: Write a brief summary at a 6th grade level. Use clear and simple language, even when explaining complex topics. Bias toward short sentences. Avoid jargon."
      },
      {
        "role": "user",
        "content": "Language documentation involves recording the speech of native speakers. Transcribing these recordings, which are rich cultural and linguistic resources, is an integral part of the language documentation process. However, transcription is slow: it often takes a linguist between 30 minutes to 2 hours to transcribe and translate a minute of speech, depending on the transcriber’s familiarity with the language and the difficulty of the content. This is a bottleneck in the documentary linguistics workflow: linguists accumulate considerable amounts of speech, but do not transcribe and translate it all, and there is a risk that untranscribed recordings could end up as “data graveyards” (Himmelmann, 2006, 4,12-13). There is clearly a need for “devising better ways for linguists to do their work” (Thieberger, 2016, 92). There has been work on low-resource speech recognition (Besacier et al., 2014), with approaches using cross-lingual information for better acoustic modelling (Burget et al., 2010; Vu et al., 2014; Xu et al., 2016; Müller et al., 2017) and language modelling (Xu and Fung, 2013). However, speech recognition technology has largely been ineffective for endangered languages since architectures based on hidden Markov models (HMMs), which generate orthographic transcriptions, require a large pronunciation lexicon and a language model trained on text. These speech recognition systems are usually trained on a variety of speakers and hundreds of hours of data (Hinton et al., 2012, 92), with the goal of generalisation to new speakers. Since large amounts of text are used for language model training, such systems often do not incorporate pitch information for speech recognition of tonal languages (Metze et al., 2013), as they can instead rely on contextual information for tonal disambiguation via the language model (Le and Besacier, 2009; Feng et al., 2012) even though there is no computational burden in additionally using pitch features. In contrast, language documentation contexts often have just a few speakers for model training and little text for language model training. However, there may be benefit even in a system that overfits to these speakers. If a phonemic recognition tool can provide a canvas transcription for manual correction and linguistic analysis, it may be possible to improve the workflow and leverage of linguists. The transcriptions collected in this semi-automated workflow can then be used for refinement of the acoustic model, leading to a snowball effect of better and faster transcription. In this paper we investigate the application of neural speech recognition models to the task of phonemic and tonal transcription in a language documentation setting where limited resources are available for model training. We use the connectionist temporal classification (CTC) formulation (Graves et al., 2006) for the purposes of direct prediction of phonemes and tones given an acoustic signal, thus bypassing the need for a pronunciation lexicon, language model, and time alignments of phonemes in the training data. By reducing the data requirements we make automatic transcription technology more feasible in a language documentation setting."
      }
    ]
  }';
?>

<?php
// get data
$sql = "SELECT id, original_text FROM text";
$result = $conn->query($sql);

// http get
$get_resp = file_get_contents("http://httpbin.org/get?x=15");

// http post
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, "https://httpbin.org/post");
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array($header1, $header2));
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
$post_resp = curl_exec($curl);
curl_close($curl);
?>

<?php
// display data
echo "<hr>DATABASE<br>";
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. "<br> original_text: " . $row["original_text"]. "<br>";
}
if ($result->num_rows == 0) {
    echo "0 results";
}

echo "<hr>HTTP GET<br>";
echo $get_resp;

echo "<hr>HTTP POST<br>";
echo $post_resp;

echo "<hr>";
echo $json;
?>

<?php
// close connection
$conn->close();
?>
