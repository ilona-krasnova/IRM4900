<?php
include("begin.php");

$response_id = $_REQUEST['response_id'];
$match = $_REQUEST['match'];

// extract data which is already saved to the database in summarise_text.php
$response = database("SELECT * FROM response WHERE id = ?", "i", $response_id)[0];
console_var("RESPONSE", $response);

$text_id = $response["text_id"];
$text = database("SELECT * FROM text WHERE id = ?", "i", $text_id)[0];
console_var("TEXT", $text);

$keyword_arr = database("SELECT * FROM text_keyword WHERE text_id = ?", "i", $text_id);
console_var("KEYWORD", $keyword_arr);

$request_arr = database("SELECT * FROM request WHERE response_id = ?", "i", $response_id);

// get difficulty name based on id
$difficulty = database("SELECT * FROM difficulty WHERE id = ?", "i", $response['difficulty_id'])[0];

// find number of requests for all difficulties of the original text ; group by difficulty id and obtain count
$request_count = database("SELECT count(*) as cnt, difficulty_id, name FROM request rq JOIN response rs ON (rs.id = rq.response_id) JOIN difficulty d ON (d.id = rs.difficulty_id) WHERE rs.text_id = ? GROUP BY difficulty_id", "i", $text_id);
console_var("COUNT", $request_count);

include("end.php");
?>
<!DOCTYPE html>
<!-- 
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members  
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924 
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

-->

<html lang="en">

    <!--Head element used to contain metadata, estabilish the website's title and import google fonts-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rescribe</title>
        <link rel="stylesheet" href="rescribe-css.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Dosis:wght@500&family=Quicksand:wght@600&display=swap');
        </style>
    </head>
    
    <body>

        <!--Website toolbar: allows user the ability to redirect to other pages of the website-->
        <div class="gridContainer">
            <div class="header">
                <img src="images/icons8-feather-48.png" class="featherIcon" alt="Rescribe icon - a feather">        
                <a href="index.php" id="rescribe">RESCRIBE</a>
                    <div class="headerRight">
                        <a href="index.php">HOME</a>
                        <a href="rescribe-about.html">ABOUT</a>
                        <a href="rescribe-contact.html">CONTACT</a>
                    </div><!--headerRight end-->
            </div><!--header end-->

            <img src="images/hootGen.svg" alt="Owl pointing at generated AI text" class="genAiOwl">

            <div class="genAiText">
                <?= $response["summary"] ?>
                <hr />
                <?php
                    foreach ($keyword_arr as $keyword) {
                        echo "<p>".$keyword["name"].": ".$keyword["description"]."</p>";
                    }
                ?>
                <hr />
                <p>Match: <?= $match ?>%<p>
                <p>Number of requests for <?= $difficulty['name'] ?> level: <?= count($request_arr) ?></p>
                <p>Total requests: 
                    <?php
                        foreach ($request_count as $count) {
                            echo "".$count["name"]."=".$count["cnt"]." ";
                        }
                    ?>
                </p>
                <hr />
                <p>Original Text</p>
                <div style="opacity:0.5; font-size: 85%"><?= $text["original_text"] ?></div>
            </div>
        </div><!--end of grid container--> 

    </body>
</html>