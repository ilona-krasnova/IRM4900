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
            <form method="post" action="output.php" class="formElement">
                    <textarea class="textAInput" id="textAI" name="textArea" placeholder="Type text here..."></textarea>
                    <input type="range" min="1" max="3" value="1" class="diffSlider" id="dSlider" name="slider" onchange="changingSlider()">
                    
                    <button type="submit" class="genBtn">Generate</button>
            </form><!--end of form-->

            <span id="sliderValue"></span>

            <img src="images/hoot.svg" alt="Owl mascot" class="homepageOwl">
            
            <!--clear button--> 
            <button onclick="clearText()" class="clearBtn">Clear</button>


        </div><!--end of grid container--> 

        <!--clear button function--> 
        <script>
            /*clear button function: clears the contents of the teatarea.
            Dsiplay and update slider value - reassign slider's predefined numerical values as Easy, Medium and Hard
            */

            function clearText(){
                document.getElementById('textAI').value = '';
            }

            let changeSlider = document.getElementById("dSlider");
            let valueOfSlider = document.getElementById("sliderValue");
            valueOfSlider.innerHTML = changeSlider.value;

            if(changeSlider.value == 1){
                valueOfSlider.innerHTML = "Easy"; 
            }

            function changingSlider() {
                if(changeSlider.value == 1){
                    valueOfSlider.innerHTML = "Easy"; 
                } else if (changeSlider.value == 2) {
                    valueOfSlider.innerHTML = "Medium";
                } else if (changeSlider.value == 3) {
                    valueOfSlider.innerHTML = "Hard";
                } else {
                    valueOfSlider.innerHTML = "undefined";
                }
            }//end of function 

            changeSlider.oninput = function() {
                valueOfSlider.innerHTML = this.value; 
            }
        </script> 

    </body>
</html>
