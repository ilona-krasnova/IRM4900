<!DOCTYPE html>
<!--
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members  
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924 
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

    - About Rescribe/ the web application's intended use
-->

    <html lang="en">

        <!--Head element used to contain metadata, estabilish the website's title and import google fonts-->
        <head>
            <?php include("head.php"); ?>
            <title>Rescribe: About</title>
        </head>

        <body>

            <?php include("header.php"); ?>

            <div class="twoThirdLayout">
                <div class="mainLayout">
                    <h1 class="pageHeader">About RESCRIBE</h1>
                    <div class="pagePara">
                        <p>Do you ever need help with reading through large or difficult texts? 
                            Rescribe is an exciting online tool designed to help make learning easier!
                            Simply paste your text into the text box, select your level of difficulty from the slider, and click submit. 
                            Rescribe works with ChatGPT to generate keywords and easy-to-read summaries based on your unique grade level.
                        </p>
                        <br/>

                        <h2>Technical Details</h2>

                        <h3>This is a student project</h3>
                        <ul>
                            <li>Carleton University - Ottawa, Canada</li>
                            <li>IRM4900 Capstone Project - Fall 2023/ Winter 2024</li>
                            <li>"Using Generative Artificial Intelligence for Age-Appropriate Text Summarization"</li>
                        </ul>
                
                        <h3>Team Members</h3>
                        <ul>
                            <li>Technical Lead: Jamila Johnson</li> 
                            <li>Documentation: Phoebe Chong</li> 
                            <li>Lead Developer/AI: Ilona Krasnova</li> 
                            <li>UI/UX Designer: Morgan Gardiner</li> 
                        </ul>

                        <h3>Legal Terms</h3>
                        <ul>
                            <li><a href="terms.php">Terms of Use</a></li>
                            <li><a href="privacy.php">Privacy Statement</a></li>
                        </ul>
                    </div>    
                </div>

                <div class="sideLayout">
                    <img src="images/aboutOwl.svg" alt="Owl thinking about the About page" class="sideLayoutOwl">
                </div><!--end of sideLayout-->

            </div><!--end of two-third layout-->
            <?php include("footer.php"); ?>


        </body>
    </html>
