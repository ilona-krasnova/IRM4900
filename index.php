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
                <a href="#name" id="rescribe">RESCRIBE</a>
                    <div class="headerRight">
                        <a href="index.php">HOME</a>
                        <a href="rescribe-about.html">ABOUT</a>
                        <a href="rescribe-contact.html">CONTACT</a>
                    </div><!--headerRight end-->
            </div><!--header end-->

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
