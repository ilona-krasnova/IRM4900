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

        <?php include("header.php"); ?>

        <div class="twoThirdLayout">
            <div class="mainLayout">
                <h1 class="pageHeader">Generate text summary</h1>
                            <!--HTML form that uses a HTTP post request to send user request/ API request.
                The form data is sent for processing to a PHP file "summarise_text.php".
            -->

              <form method="post" action="summarise_text.php" class="formElement">
                <label for="textAI" id="subHeader">Please paste the text to simplify into the box below:</label>
                <textarea class="textAInput" id="textAI" name="text" placeholder="Paste text here..." rows="12"></textarea>

                <div class="radioOptions">
                          <label class="radioContainer" for="simple">
                            <input type="radio" id="simple" name="level" value="1" onchange="changingSlider()">
                            <span class="checkmark"></span> Simple
                          </label>
                          <label class="radioContainer" for="medium">
                            <input type="radio" id="medium" name="level" value="2" onchange="changingSlider()">
                            <span class="checkmark"></span> Medium
                          </label>
                          <label class="radioContainer" for="complex">
                            <input type="radio" id="complex" name="level" value="3" onchange="changingSlider()">
                            <span class="checkmark"></span> Complex
                          </label>
                </div>

                <div class="buttonRow">
                  <button type="button" class="pasteBtn" onclick="pasteText()">Paste</button>
                  <button type="button" class="clearBtn" onclick="clearText()">Clear</button>
                  <button type="submit" class="genBtn">Generate</button>
                </div>
             </form><!--end of form-->

            </div><!--end of main layout-->

            <div class="sideLayout">
              <!-- Text bubble container -->
               <div class="textBubble">
                 <div class="talk-bubble talk-bubble-triangle">
                   <div class="talktext">
                     <p>Hi, I'm Edgar! Welcome to Rescribe. Please paste your text in the text box.</p>
                   </div>
                 </div>
               </div>
                <img src="images/homepageOwl.svg" alt="Owl mascot" class="sideLayoutOwl">
            </div><!--end of side layout-->

        </div><!--end of two-third layout-->

            <?php include("footer.php"); ?>

            <script>
                // Update text when form is submitted
                function updateSliderText() {
                    let radios = document.getElementsByName('level');
                    let valueOfSlider = document.getElementById("sliderValue");
                    //Loop to find checked radio button
                    for (let i = 0; i < radios.length; i++) {
                        if (radios[i].checked) {
                            if (radios[i].value == 1) {
                                valueOfSlider.innerHTML = "Simple";
                            } else if (radios[i].value == 2) {
                                valueOfSlider.innerHTML = "Medium";
                            } else if (radios[i].value == 3) {
                                valueOfSlider.innerHTML = "Complex";
                            }
                            break;
                        }
                    }
                }

                // Call the function to set up displayed text
                updateSliderText();

                document.querySelector('.formElement').addEventListener('submit', function(event) {
                    // Update text when form is submitted
                    updateSliderText();
                });

                //Paste copied text
                function pasteText() {
                    navigator.clipboard.readText()
                        .then(text => {
                            // Paste text textarea
                            document.getElementById('textAI').value = text;
                        })
                        .catch(err => {
                            console.error('Failed to read clipboard contents: ', err);
                        });
                }

                //Clear text from the textarea
                function clearText() {
                document.getElementById("textAI").value = "";
            }
        </script>

    </body>
</html>
