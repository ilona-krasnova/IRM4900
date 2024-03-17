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

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Rescribe</title>
            <link rel="stylesheet" href="styles.css">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Quicksand:wght@300..700&display=swap');
            </style>
            <link rel="icon" href="images/icons8-feather-48.png" />
        </head>

        <body>
            <?php include("header.php"); ?>

            <div class="centerLayout">
                <div class="centerMainLayout">
                    <h1 class="centerPageHeader">Contact us</h1>
                    <p class="centerPagePara">If you have any questions or just want to say hi, drop us a message below! We’d love to hear from you.  
                    </p>                      
                </div><!--end of center main layout-->

                <div class="centerLayoutImage">
                    <img src="images/contactUsOwl.svg" alt="Owl throwing a paperplane" class="centerLayoutOwl">
                </div><!--end of center layout image-->

                <div class="contactIcons">
                    <img src="images/icons8-email-50.png" alt="Email icon" class="emailIcon">
                    <p class="emailPara">Rescribe@Rescribe.ca</p>
                    
                    <img src="images/icons8-location-50.png" alt="Address icon" class="emailIcon">
                    <p class="addressPara">1125 Colonel By Dr, Ottawa, ON</p>    
                    
                    <img src="images/icons8-phone-50.png" alt="Phone icon" class="emailIcon">
                    <p class="phonePara">(613) 520-2600</p>
                </div><!--end of contact icons-->

            </div><!--end of center layout-->

            <?php include("footer.php"); ?>

        </body>
    </html>
