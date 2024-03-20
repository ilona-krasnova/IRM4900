<!DOCTYPE html>
<!--
    - IRM4900 Capstone Project - Fall 2023/ Winter 2024
    - Using Generative Artificial Intelligence for Age-Appropriate Text Summarization

    - Team Members
    - Technical Lead: Jamila Johnson | 101206365
    - Documentation: Phoebe Chong | 101075924
    - Lead Developer/AI: Ilona Krasnova | 101211529
    - UI/UX Designer: Morgan Gardiner | 101024884

    - Rescribe Promotional Website-->
<html lang="en">

    <!--Head element used to contain metadata, estabilish the website's title and import google fonts-->
    <head>
        <?php include("head.php"); ?>
        <title>Rescribe: Promotional Webpage</title>
    </head>
    <body>
        <?php include("header.php"); ?>

        <div class="twoThirdLayout">
            <div class="mainLayout">
                <div class="pageHeader">
                  <h1> Using Generative Artificial Intelligence for Age-Appropriate Text Summarization: Rescribe</h1>
                  <h3> Phoebe Chong, Morgan Gardiner, Jamila Johnson, Ilona Krasnova </h3>
                  <h3> IRM 4900 - Capstone Project </h3>
               </div>

                <div class="pagePara">
                    <h2> Project Summary </h2>
                    <p> In recent years, Artificial Intelligence (AI) integration in education, particularly through large
                      language models (LLMs),has presented new learning opportunities to enhance students' academic experience.
                      While existing text summarisation platforms offer AI-based document summaries or simplified language,
                      there's a current gap in summarisation tools that support the educational needs of children while preventing
                      academic misconduct such as plagiarism. Additionally, these platforms often lack child-friendly interfaces
                      and lack sufficient instruction and navigation. Rescribe, a web-based educational tool, addresses these challenges
                      by simplifying complex texts and generating tailored summaries and keyword definitions based on students' unique
                      reading comprehension levels. Rescribe differs from other AI tools with the novel use of a database that publicly
                      logs all submitted texts to ensure the reproducibility of results. Moreover, it contributes to LLM literature and
                      readability by testing 7 prompts across three reading levels.
                    </p>

                    <h2> Project Objectives </h2>
                      <ol>
                        <li> Develop a simple, easy-to-use web interface for an educational tool that allows users with minimal technical proficiency to paste text and view summary results and keyword definitions using best practices geared toward young users.</li>
                        <li> Integrate a generative AI model with programmed protocols that protect users from age-inappropriate content. </li>
                        <li> Ensure reproducibility of results to allow instructors to identify plagiarism. </li>
                        <li> Contribute to existing research on AI and its application in K-8 education settings.</li>
                      </ol>

                      <h2> Literature Review </h2>

                      <p> Our literature review examined the use of large language models (LLMs), such as ChatGPT, in educational environments
                        to determine how they could improve student engagement and comprehension. We conducted a comparative analysis of existing
                        text summarization tools to identify current gaps. Our aim was to determine how to address these gaps and create a customized
                        educational tool suitable for children in the K-8 range.
                      </p>

                      <h2> User Interface/Experience Design </h2>

                      <p> Based on the results from our literature review, we focused on developing
                        a simple and intuitive interface that follows guidelines and best practices geared toward
                        children in the concrete operational stage (ages 7 to 11). This includes considering the fine motor
                        skills and developmental needs of children in this age range and prioritising an intuitive interface
                        that provides clear navigational paths and instructions. Our vibrant colour palette, gamification,
                        and feedback in the form of our mascot Edgar the Owl, are all unique features that differentiate
                        Rescribe from other similar tools while increasing young users' experience and engagement with our application.
                      </p>

                      <h2> Entity Relationship (ER) Diagram </h2>

                      <p> Our Entity Relationship (ER) Diagram illustrates the design of our relational database for our
                        Text Summary Application Process, which facilitates the generation of text summaries and definitions
                        using PHP and MySQL.
                      </p>

                     <center> <img src="images/erDiagram.jpg" alt="Entity Relationship (ER) Diagram" class="promoImage" width="700" height="auto"></center>
                    <center><p style="font-size: 12px;"> Entity Relationship (ER) Diagram for Rescribe Database </p></center>

                     <h2> Prompt Design </h2>

                     <p> Our original design was geared towards children aged 7 to 11.
                       As such, the prompt for the easy level summary would ideally score a Flesch Kincaid Grade Level of 2,
                       4 for the medium level, and 6 for the hard level. Prompt 7 performed consistently well across all levels,
                       achieving the desired grade levels with notable stability. Prompt 2 had the second-best performance across all levels.
                       The relative success of Prompt 7 as opposed to Prompt 2 suggests that providing sentence length numbers aids in
                       summarization. The prompts' overall performance demonstrates the difficulty of generating texts for beginner readers.
                     </p>

                     <center><img src="images/promptDesign.jpg" alt="Prompt Design" class="promoImage" width="700" height="auto"></center>
                    <center><p style="font-size: 12px;"> Box and Whisker Plots of Prompts and FKGL Scores by Level </p></center>

                     <h2> Text Summary Application Process </h2>

                     <p> When a user interacts with Rescribe the following steps occur during the text summary application process:</p>

                     <ul>
                       <li> First, PHP initiates the process by checking if the textarea on the homepage is empty.
                         If the textarea is empty, a prompt is displayed instructing the user to add text into the textbox. </li>
                       <li> Once the user adds text into the textarea, PHP first verifies if the raw text is saved in the MySQL database.
                         If the raw text is not saved, a cURL session is established to send an API POST request to ChatGPT, including the raw text and difficulty level.  </li>
                       <li> ChatGPT then generates a summary and keywords based on the unique difficulty level selected by the user, which are displayed on the homepage
                         and stored in the database along with the raw text, difficulty level, and timestamp.  </li>
                       <li> If the raw text and difficulty level are already in the database, the insert procedure is skipped, and the ChatGPT API response is directly displayed. </li>
                   </ul>

                    <h2> Project Completion </h2>

                    <p>Our group will present our web application, Rescribe, at the IRM Capstone Fair on April 10 from 2:30 to 5:00 p.m.</p>

                </div>
            </div><!--end of main layout-->
            <div class="sideLayout">
              <!-- Text bubble container -->
                <img src="images/homepageOwl.svg" alt="Owl mascot" class="sideLayoutOwl">
            </div><!--end of side layout-->
        </div><!--end of two-third layout-->
            <?php include("footer.php"); ?>

    </body>
</html>
