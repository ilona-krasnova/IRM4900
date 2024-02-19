<!DOCTYPE html>
<!--
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members  
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924 
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

    - Rescribe's about page. Used to explain the users Rescribe's purpose, mission and how to use its features. 
-->

<html lang="en">
        
    <!--Head element used to contain metadata, estabilish the website's title and import google fonts-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rescribe: About</title>
        <link rel="stylesheet" href="rescribe-css.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Dosis:wght@500&family=Quicksand:wght@600&family=Roboto:wght@700&display=swap');
        </style>
        <link rel="icon" href="images/icons8-feather-48.png" />
    </head>

    <body>

        <!--Website toolbar: allows user the ability to redirect to other pages of the website-->
        <div class="gridContainer">
        
            <?php include("header.php"); ?>

            <!--About Rescribe/ the web application's intended use-->
            <h1 class="aboutHeader">About RESCRIBE</h1>
            <div class="aboutPara">
                <p>
Do you ever need help with reading through large or difficult texts? 
Rescribe is an exciting online tool designed to help make learning easier!
Simply paste your text into the text box, select your level of difficulty from the slider, and click submit. 
Rescribe works with ChatGPT to generate keywords and easy-to-read summaries based on your unique grade level.
                </p>

                <br/>

                <h2>Technical details</h2>

                <h3>This is a student project</h3>
                <ul>
                    <li>Carleton Univercity - Ottawa, Canada</li>
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
                    <li><a href="rescribe-terms.php">Terms of Use</a></li>
                    <li><a href="rescribe-privacy.php">Privacy Statement</a></li>
                </ul>
            </div>    

            <img src="images/hootAboutOG.svg" alt="Owl mascot waving" class="aboutOwl">

            <?php include("footer.php"); ?>
            
        </div><!--end of grid container--> 

    </body>
</html>