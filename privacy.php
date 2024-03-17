<!DOCTYPE html>
<!--
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members  
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924 
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

    - Privacy statement. 
-->

<html lang="en">
        
    <!--Head element used to contain metadata, estabilish the website's title and import google fonts-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rescribe: Privacy</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Dosis:wght@500&family=Quicksand:wght@600&family=Roboto:wght@700&display=swap');
        </style>
        <link rel="icon" href="images/icons8-feather-48.png" />
    </head>

    <body>

        <?php include("header.php"); ?>
        
        <div class="twoThirdLayout">
            <div class="mainLayout">
                <h1 class="pageHeader">Privacy Statement</h1>
                <div class="pagePara">
                    <h2>Summary for children</h2>
                    <p>We want to keep you safe. We don't try to get any personal info from you. When you send us something to make shorter, we only 
                        use it to help create the summary. We ask you not to send us anything private because we can't make sure it stays secret. If 
                        by accident you send us something personal, we won't keep it or use it for anything else. We work hard to keep our system safe, 
                        but we can't promise that everything you share with us will stay private since other people might see it. It's your job to make sure that 
                        what you send us isn't secret or something that belongs to someone else.
                    </p>

                    <div style="font-size:80%; font-style:italic; width:100%; text-align:right;">( Created using Rescribe : )</div>

                    <h2>Details for grown-ups</h2>

                    <div style="font-size:90%;">
                        <p>Our project is committed to protecting your privacy. This statement outlines our practices regarding the handling 
                            of any information related to the texts submitted for summarization.
                        </p>

                        <h3>Collection of Information</h3>
                        <ul>
                            <li>We do not intentionally collect personal information. Texts submitted for summarization are used solely for creating summaries.</li>
                            <li>We discourage the submission of texts containing personal or sensitive information. If such information is included in the texts, we are not responsible for its use or disclosure.</li>
                            <li>In cases where users inadvertently or purposefully submit personal information, we do not use, share, or store this information for any purposes beyond the necessary technical requirements of providing the Project service.</li>
                        </ul>

                        <h3>Use of Information</h3>
                        <p>Since we do not intentionally collect personal information, the Project does not use any user information for purposes other than the technical facilitation of the Project's functionalities. Any incidental collection of personal information 
                            will not be used to identify, contact, or target advertising to users.
                        </p>

                        <h3>Data Security</h3>
                        <p>We take reasonable measures to protect the security of the system. However te texts submitted to our service are available to view by other users, and we cannot guarantee the security of any information contained within these texts.
                        </p>

                        <h3>User Submissions</h3>
                        <p>Users are responsible for ensuring that any text submitted does not contain confidential, sensitive, or copyrighted material without proper authorization. We are not liable for the use or disclosure of any such information contained in submitted texts.
                        </p>

                        <h3>Changes to Privacy Statement</h3>
                        <p>We reserve the right to modify this Privacy Statement at any time. Any changes will be effectively communicated to users through the Project's platform or other means deemed appropriate.
                        </p>

                        <h3>Contact Us</h3>
                        <p>Should you have any questions regarding this Privacy Statement or the Project's practices, please <a href="contact.php">contact us</a> directly.
                        </p>
                    </div>
                </div><!--end of pagePara-->
            </div><!--end of main layout-->

            <div class="sideLayout">
                <img src="images/privacyOwl.svg" alt="Owl thinking about privacy" class="sideLayoutOwl">
            </div><!--end of side layout-->

        </div><!--end of two-third layout-->

        <?php include("footer.php"); ?>
            
    </body>
</html>
