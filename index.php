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
                <a href="#name" id="rescribe">RESCRIBE</a>
                    <div class="headerRight">
                        <a href="index.php">HOME</a>
                        <a href="rescribe-about.html">ABOUT</a>
                        <a href="rescribe-contact.html">CONTACT</a>
                    </div><!--headerRight end-->
            </div><!--header end-->

            <!--HTML form that uses a HTTP post request to send user request/ API request.
                The form data is sent for processing to a PHP file "output.php".
            -->
            <form method="post" action="summarise_text.php" class="formElement">
                    <label for="textAI" id="instructions">Please paste the text to simplify into the box below</label>
                    <textarea class="textAInput" id="textAI" name="text" placeholder="Type text here..."></textarea>
                    <input type="range" min="1" max="3" value="1" class="diffSlider" id="dSlider" name="level" onchange="changingSlider()">
                    
                    <input type="reset" class="clearBtn" value="Clear">
                    <button type="submit" class="genBtn">Generate</button>
            </form><!--end of form-->

            <span id="sliderValue"></span>

            <img src="images/hoot.svg" alt="Owl mascot" class="homepageOwl">


        </div><!--end of grid container--> 

        <!--clear button function--> 
        <script>
            /*Dsiplay and update slider value - reassign slider's predefined numerical values as Simple, Medium and Complex
            */

            let changeSlider = document.getElementById("dSlider");
            let valueOfSlider = document.getElementById("sliderValue");
            valueOfSlider.innerHTML = changeSlider.value;

            if(changeSlider.value == 1){
                valueOfSlider.innerHTML = "Simple"; 
            }

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
