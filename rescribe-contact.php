<!DOCTYPE html>
<!--
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members  
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924 
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

    - Rescribe's contact page. Used to allow students, teachers and parents the ability to 
    - provide feedback, send inquires, make complaints etc. 
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

            <h1 class="contactHeader">Contact us</h1>
            <p class="contactPara">If you have any questions or just want to say hi, drop us a message below! We’d love to hear from you.  
            </p>
            
            <!--HTML form that uses a HTTP post request to send user request (e.g., user inquiry or feedback)
                The form data is sent for processing to a PHP file "contactForm.php".
            -->
            <form method="post" action="contactForm.php" class="conForm">
                <label for="conTextAI" id="contactFormLabel1">Contact Textarea</label>
                <textarea class="conTextA" id="conTextAI" name="conTextArea" placeholder="Enter your message..."></textarea>
                <input type="reset" class="clearBtn2" value="Clear">
                <button type="submit" class="sendBtn">Send</button>
            </form>

            <img src="images/hootContact.svg" alt="Owl mascot" class="contactOwl">

            <?php include("footer.php"); ?>

        </div><!--end of grid container--> 
    </body>
</html>