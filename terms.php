<!DOCTYPE html>
<!--
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members  
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924 
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

    - Terms of use. 
-->

<html lang="en">
        
    <!--Head element used to contain metadata, estabilish the website's title and import google fonts-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rescribe: Terms of use</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Quicksand:wght@300..700&display=swap');
        </style>
        <link rel="icon" href="images/icons8-feather-48.png" />
    </head>

    <body>
        <!--Website toolbar: allows user the ability to redirect to other pages of the website-->
        <?php include("header.php"); ?>

        <div class="twoThirdLayout">
            <div class="mainLayout">
                <h1 class="pageHeader">Terms of Use</h1>
                <div class="pagePara">
                    <h2>Summary for children</h2>
                        <p>Our project is like a special helper that takes big, grown-up writing and makes it easier to understand for 
                            young friends like you. When you use our helper, you agree to play by the rules. This means you can't break 
                            it or bother other people using it. You can't sneak into places you're not supposed to go, and you can't bring 
                            in yucky computer bugs. If you give us a story to make simple, you have to make sure it's okay to share it. When 
                            we make it simple, that new, easy story belongs to us, but the big story still belongs to the person who wrote it. 
                            You can't take the easy story and pretend it's yours. If something goes wrong while you're using the helper, we're 
                            really sorry, but we can't fix everything. If you're ever confused or have questions, it's okay to <a href="contact.php">ask us for help</a>!
                        </p>

                        <div style="font-size:80%; font-style:italic; width:100%; text-align:right;">( Created using Rescribe : )</div>

                        <h2>Details for grown-ups</h2>

                        <div style="font-size:90%;">

                            <p>Welcome to our student project (the "Project") which creates summaries of complex texts for children. This Project 
                                is designed for educational purposes and is primarily intended for use by the professor, teaching assistants (TAs), 
                                and potentially by occasional users who discover it online. 
                            </p>

                            <h3>Acceptance of Terms</h3>

                            <p>By using the Project, you confirm your acceptance of these Terms of Use. If you do not agree to these Terms, you must not access or use the Project.</p>

                            <h3>User Responsibilities</h3>
                            <ul>
                                <li>You agree not to use the Project in any manner that could disable, overburden, damage, or impair the Project or interfere with any other party's use of the Project.</li>
                                <li>You agree not to attempt to gain unauthorized access to any parts of the Project or any server, computer, or database connected to the Project.</li>
                                <li>You agree not to introduce viruses, trojans, worms, logic bombs, or other material that is malicious or technologically harmful.</li>
                                <li>You are responsible for any text you submit for summarization. You must ensure you have the right to use these texts and that they do not infringe on any copyright, privacy, or other legal rights.</li>
                                <li>By submitting texts, you grant us the permission to create summaries of these texts for educational purposes.</li>
                            </ul>

                            <h3>Intellectual Property Rights</h3>
                            <ul>
                                <li>The summaries created by our project are the intellectual property of the project creators. The original texts remain the property of their respective owners.</li>
                                <li>You agree not to use the summaries in a way that infringes on the copyright of the original texts.</li>
                                <li>The content, features, and functionality of the Project are and will remain the exclusive property of the project creators and their licensors. The Project is protected by copyright, trademark, and other intellectual property laws of Canada and foreign countries.</li>
                            </ul>

                            <h3>Content Disclaimer</h3>

                            <p>We do not claim ownership of the texts submitted by users but require the right to use these texts to create summaries. We are not responsible 
                                for any copyrighted or sensitive information contained in the submitted texts. It is the user's responsibility to ensure no infringement or breach 
                                of confidentiality occurs by submitting texts.
                            </p>

                            <h3>Limitation of Liability</h3>

                            <p>The project is provided "as is," without warranty of any kind. We are not liable for any damages arising from your use of the service or reliance
                                on the summaries provided.
                            </p>

                            <h3>Modifications to Terms</h3>

                            <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. We will provide notice of any changes by posting the 
                                new Terms on the Project's website.
                            </p>

                            <h3>Contact Us</h3>

                            <p>If you have any questions about these Terms, please <a href="contact.php">contact us</a>.</p>
                        </div>
                </div><!--end of pagePara-->  
            </div><!--end of mainLayout-->
            
            <div class="sideLayout">
                <img src="images/hootAboutOG.svg" alt="Owl mascot waving" class="sideLayoutOwl">
            </div><!--end of side layout-->

        </div><!--end of two-third layout-->

        <?php include("footer.php"); ?>

    </body>
</html>
