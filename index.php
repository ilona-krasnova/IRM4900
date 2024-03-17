<!DOCTYPE html>
<!-- 
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members  
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924 
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

    - Rescribe's homepage. Function: A web-based educational tool that simplifies keywords and summarises complex text documents. 
-->

<html lang="en">

    <!--Head element used to contain metadata, estabilish the website's title and import google fonts-->
    <head>
        <?php include("head.php"); ?>
        <title>Rescribe: Homepage</title>
    </head>

    <body>

         <!--Website toolbar: allows user the ability to redirect to other pages of the website-->
        <div class="gridContainer">
                
            <?php include("header.php"); ?>

            <h1 class="aboutHeader">Generate text summary</h1>

            <!--HTML form that uses a HTTP post request to send user request/ API request.
                The form data is sent for processing to a PHP file "summarise_text.php".
            -->
            <form method="post" action="summarise_text.php" class="formElement">
                    <label for="textAI" id="instructions">Please paste the text to simplify into the box below</label>
                    <textarea class="textAInput" id="textAI" name="text" placeholder="Paste text here..."></textarea>
                    <input type="range" min="1" max="3" value="1" class="diffSlider" id="dSlider" name="level" onchange="changingSlider()">
                    
                    <input type="reset" class="clearBtn" value="Clear">
                    <button type="submit" class="genBtn">Generate</button>
            </form><!--end of form-->

            <span id="sliderValue"></span>

            <img src="images/homepageOwl.svg" alt="Owl mascot" class="homepageOwl">

            <?php include("footer.php"); ?>

        </div><!--end of grid container--> 

        <!--clear button function--> 
        <script>
            /*Dsiplay and update slider value - reassign slider's predefined numerical values as Simple, Medium and Complex
            */

            let changeSlider = document.getElementById("dSlider");
            let valueOfSlider = document.getElementById("sliderValue");
            valueOfSlider.innerHTML = changeSlider.value;

            changingSlider();
            // if(changeSlider.value == 1){
            //     valueOfSlider.innerHTML = "Simple"; 
            // }

            function changingSlider() {
                if(changeSlider.value == 1){
                    valueOfSlider.innerHTML = "Simple"; 
                } else if (changeSlider.value == 2) {
                    valueOfSlider.innerHTML = "Medium";
                } else if (changeSlider.value == 3) {
                    valueOfSlider.innerHTML = "Complex";
                // } else {
                //     valueOfSlider.innerHTML = "undefined";
                }
            }//end of function 

            changeSlider.oninput = function() {
                valueOfSlider.innerHTML = this.value; 
            }
        </script> 

    </body>
</html>
