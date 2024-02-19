<!DOCTYPE html>
<!-- 
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members  
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924 
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

    - Rescribe's contact page. Displaying that the form has been sent 
-->

<html lang="en">

    <!--Head element used to contain metadata, estabilish the website's title and import google fonts-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rescribe: Contact</title>
        <link rel="stylesheet" href="rescribe-css.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Dosis:wght@500&family=Quicksand:wght@600&display=swap');
        </style>
        <link rel="icon" href="images/icons8-feather-48.png" />
    </head>

    <body>

        <!--Website toolbar: allows user the ability to redirect to other pages of the website-->
        <div class="gridContainer">
        
            <?php include("header.php"); ?>

            <h1 class="thankYouMes">THANK YOU FOR WRITING US</h1>
            <p class="userMes">Dear user, we got your request and we will be in touch.</p>

            <img src="images/hootContactSub.svg" alt="Owl mascot" class="contactOwlSub">

            <?php include("footer.php"); ?>       

        </div><!--end of grid container--> 

    </body>
</html>