<?php 
include("begin.php");
$responses = database("SELECT r.id as rid, summary, difficulty_id, original_text, text_id FROM response r JOIN text t on (t.id = r.text_id) ORDER BY t.id DESC, r.difficulty_id DESC LIMIT 100");
// console_var("RESPONSES", $responses); 
include("end.php");
?>

<html>

    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Rescribe: Response Log</title>
            <link rel="stylesheet" href="styles.css">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Quicksand:wght@300..700&display=swap');
            </style>
            <link rel="icon" href="images/icons8-feather-48.png" />
    </head>

    <body>
        <?php include("header.php"); ?>

        <h1 class="pageHeaderLogR">Last 100 responses</h1>
        <?php
            $last_text_id = 0;
            foreach($responses as $resp) {
                if (!empty($resp['summary']) && $resp['difficulty_id'] <= 3) {
                    if ($resp['text_id'] != $last_text_id) {
                        echo '<div style="margin-top: 1%; padding-left: 6%; padding-right: 6%; font-family: Arial, Helvetica, sans-serif;">'.strtok($resp['original_text'], '.').'</div>';
                    }
                    echo '<div style="padding-left: 6%; padding-right: 6%; font-family: Arial, Helvetica, sans-serif;">'. ''.$resp['difficulty_id'].') <a href="output.php?response_id='.$resp['rid'].'">'.strtok($resp['summary'],'.').'</a>'.'</div>';
                    echo nl2br("\n");
                    $last_text_id = $resp['text_id'];
                }
            } 
        ?>
        
        <?php include("footer.php") ?>

  </body>
</html>
