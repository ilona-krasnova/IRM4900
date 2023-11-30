<!DOCTYPE html>
<html lang="en">

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

        <div class="gridContainer">
            <div class="header">
                <img src="images/icons8-feather-48.png" class="featherIcon" alt="Rescribe icon - a feather">        
                <a href="#name" id="rescribe">Rescribe</a>
                    <div class="headerRight">
                        <a href="index.php">HOME</a>
                        <a href="rescribe-about.html">ABOUT</a>
                        <a href="rescribe-contact.html">CONTACT</a>
                    </div><!--headerRight end-->
            </div><!--header end-->

            <img src="images/hootGen.svg" alt="Owl pointing at generated AI text" class="genAiOwl">

            <?php
            
            //Checking that the textarea is set/ copy value from textarea 
            if (isset($_POST['textArea'])) {
                $userInputVal = $_POST['textArea'];
            } else {
                echo "textarea is empty";
            }

            $apiKey = ""; 
            $chatCompletions = "https://api.openai.com/v1/chat/completions"; 

            //Chat completions: https://platform.openai.com/docs/api-reference/chat/object 
            $headers = array(
                "Content-Type: application/json", 
                "Authorization: Bearer ".$apiKey
            );

            $data = array (
                "model" => "gpt-3.5-turbo", 
                "messages" => array(
                    array(
                        "role" => "system", 
                        "content" => "Talking with ChatGPT"
                    ),
                    array(
                        "role" => "user", 
                        "content" => $userInputVal
                    )));

            $jsonData = json_encode($data); 
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $chatCompletions);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
            $res = curl_exec($ch); 
            curl_close($ch);

            //decodeing json data to store it in php var - print out ai response  
            $finalRes = json_decode($res, true); 
            $finalfinal = $finalRes['choices'][0]['message']['content'];
            
            //echo $finalfinal;  
            echo '<div class="genAiText">';
            echo $finalfinal;
            echo '</div>';

            $dbConnection = mysqli_connect("sql204.infinityfree.com","if0_35518104","ZtXRXmZx8fjsf","if0_35518104_saveRes");
            $userInputVal = $_POST['textArea'];
            $userInputDiff = $_POST['slider'];
            $sqlStatement = "INSERT INTO `dbSRes` (`responseID`, `responseText`, `userRequest`, `userDiff`) VALUES ('0', '$finalfinal', '$userInputVal', '$userInputDiff')";
            $dbResult = mysqli_query($dbConnection, $sqlStatement);

            //checking db if generated text is saved in the database or not. 
            $sqlSearchStatement = "SELECT * FROM `dbSRes` WHERE `userRequest` = '$userInputVal'"; 
            $dbSConnection = mysqli_query($dbConnection, $sqlSearchStatement);
            $countRequest = mysqli_num_rows($dbSConnection);

            //echo $countRequest; 

            if($countRequest == 1) {
                echo '<div class="countDiv">';
                echo "First Request";
                echo '</div>';
            }else {
                echo '<div class="countDiv">';
                echo "Overall count of requests: $countRequest";
                echo '</div>';
            }

            mysqli_close($dbConnection); //closing the db connection 


                
            ?><!--end of php code-->
    

        </div><!--end of grid container--> 

        


    </body>
</html>

    