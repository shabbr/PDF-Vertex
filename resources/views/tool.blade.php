<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Page</title>
    <link rel="stylesheet" href="{{asset('css/styleTool.css')}}">

</head>


<body>
    <!-- Responsive Header -->
    <header class="header">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <nav class="sidebar">
            <ul>
                <div class="sidebarlink" id="paraphrasingLink">
                    <li> <a href="#paraphrasing">Paraphrasing</a></li>
                </div>
                <div class="sidebarlink" id="plagiarismLink">
                    <li><a href="#plagiarism">Plagiarism Checker</a></li>
                </div>
                <div class="sidebarlink" id="GrammerlyLink">
                    <li><a href="#grammarly">Grammarly</a></li>
                </div>
            </ul>
        </nav>
        <div>
            <button> <a href="{{route('home')}}" style='text-decoration:none; color:inherit;'> Back </a></button>
        </div>
    </header>
    <div style="display: flex;">

        <div class="content" id="paraphrasingContent" style="display: flex; flex-wrap: wrap;">
            <div class="Paraphrasing">
                <div
                    style="background-color: #B4B5DC; padding: 12px; text-align:center; font-size: 30px; font-weight: bold;">
                    Paraphrasing</div>
                <div class="Paraphrasing-content">
                    <form class="paracontent">
                        <textarea name="originalText" id="originalText" cols="61" rows="25"
                            placeholder="Write or paste text here for paraphrasing"></textarea>
                        <button type="button" class="btn" id="paraphraseButton">Paraphrasing</button>
                    </form>
                    <div class="pararesult" id="paraphrasedResult"></div>
                </div>
            </div>
        </div>


        <div class="content" id="plagiarismContent" style="display: none;">
            <div class="Paraphrasing">
                <div
                    style="background-color: #B4B5DC; padding: 12px; text-align:center; font-size: 30px; font-weight: bold;">
                    Plagiarism Checker</div>
                <div class="Paraphrasing-content">
                    <form class="paracontent" onsubmit="return checkPlagiarism(event)">
                        <textarea name="originalText" id="originalText" cols="61" rows="25"
                            placeholder="Write or paste text here and then press plagiarism"></textarea>
                        <button type="submit" class="btn">Plagiarism Check</button>
                    </form>
                    <div class="pararesult" style="padding: 20px;">
                        <h2 style="padding-left: 20px;">Plagiarism Report</h2>
                        <div id="plagiarismReport"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content" id="Grammerly" style="display: none;">
            <div class="Paraphrasing">
                <div
                    style="background-color: #B4B5DC; padding: 12px; text-align:center; font-size: 30px; font-weight: bold;">
                    Grammar Checker
                </div>
                <div class="Paraphrasing-content">
                    <form class="grammarlychecker" onsubmit="return checkGrammar(event)">
                        <div>
                            <button onclick="document.execCommand('bold', false, '')">Bold</button>
                            <button onclick="document.execCommand('italic', false, '')">Italic</button>
                            <button onclick="document.execCommand('underline', false, '')">Underline</button>
                            <button onclick="document.execCommand('justifyLeft', false, '')">Align Left</button>
                            <button onclick="document.execCommand('justifyCenter', false, '')">Align Center</button>
                            <button onclick="document.execCommand('justifyRight', false, '')">Align Right</button>
                            <button onclick="document.execCommand('justifyFull', false, '')">Justify</button>
                            <button onclick="document.execCommand('formatBlock', false, 'p')">Paragraph</button>
                            <button onclick="document.execCommand('formatBlock', false, 'h1')">Heading</button>
                            <select onchange="document.execCommand('fontName', false, this.value)">
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Courier New">Courier New</option>
                            </select>
                            <select onchange="document.execCommand('fontSize', false, this.value)">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                            <label for="colorPicker"></label>
                            <input type="color" onchange="document.execCommand('hiliteColor', false, this.value)">
                        </div>
                        <div id="editor" contenteditable="true">
                            <p>Start typing here...</p>
                        </div>
                        <div id="grammarReport"></div>

                        <button type="submit" class="btn">Grammar Check</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#paraphraseButton').on('click', function () {
                var originalText = $('#originalText').val();

                var settings = {
                    async: true,
                    crossDomain: true,
                    url: 'https://rewriter-paraphraser-text-changer-multi-language.p.rapidapi.com/rewrite',
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json',
                        'X-RapidAPI-Key': '4492aeeb6fmsha6bbc224b9ffd5bp15feb1jsnd1e70044c4a5',
                        'X-RapidAPI-Host': 'rewriter-paraphraser-text-changer-multi-language.p.rapidapi.com'
                    },
                    "processData": false,
                    "data": JSON.stringify({
                        "language": "en",
                        "strength": 3,
                        "text": originalText
                    })
                };

                $.ajax(settings).done(function (response) {
                    console.log(response)
                    $('#paraphrasedResult').html('<p class="paraphrased-text" style="padding:20px;">' + response.rewrite + '</p>');
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    $('#paraphrasedResult').text("Error: " + errorThrown);
                });
            });
        });


        // plagrisum ******************************************
        function checkPlagiarism(event) {
            event.preventDefault();

            var originalText = document.getElementById("originalText").value;

            const settings = {
                async: true,
                crossDomain: true,
                url: 'https://ai-plagiarism-checker.p.rapidapi.com/detector/v1/',
                method: 'POST',
                headers: {
                    'content-type': 'application/x-www-form-urlencoded',
                    'X-RapidAPI-Key': '4492aeeb6fmsha6bbc224b9ffd5bp15feb1jsnd1e70044c4a5',
                    'X-RapidAPI-Host': 'ai-plagiarism-checker.p.rapidapi.com'
                },
                data: {
                    content: originalText
                }
            };

            $.ajax(settings).done(function (response) {
                displayPlagiarismReport(response);
            });
        }

        function displayPlagiarismReport(response) {
            var plagiarismReportDiv = document.getElementById("plagiarismReport");

            plagiarismReportDiv.innerHTML = "";
            var heading = document.createElement("h2");
            heading.textContent = "Plagiarism Report";
            plagiarismReportDiv.appendChild(heading);

            var aiPercentageParagraph = document.createElement("p");
            aiPercentageParagraph.textContent = "AI Percentage: " + response.ai_percentage;
            plagiarismReportDiv.appendChild(aiPercentageParagraph);

            var averageScoreParagraph = document.createElement("p");
            averageScoreParagraph.textContent = "Average Score: " + response.average_score;
            plagiarismReportDiv.appendChild(averageScoreParagraph);

            var contentLabelParagraph = document.createElement("p");
            contentLabelParagraph.textContent = "Content Label: " + response.content_label;
            plagiarismReportDiv.appendChild(contentLabelParagraph);

            var gptzeroMeLabelParagraph = document.createElement("p");
            gptzeroMeLabelParagraph.textContent = "GPTZero ME Label: " + response.gptzero_me_label;
            plagiarismReportDiv.appendChild(gptzeroMeLabelParagraph);

            // Create paragraphs for sentence scores
            var sentenceScoresHeading = document.createElement("h2");
            sentenceScoresHeading.textContent = "Sentence Scores";
            plagiarismReportDiv.appendChild(sentenceScoresHeading);

            var sentenceScoresList = document.createElement("ul");
            response.sentence_scores.forEach(function (score) {
                var sentenceItem = document.createElement("li");
                sentenceItem.textContent = score[0] + ": " + score[1];
                sentenceScoresList.appendChild(sentenceItem);
            });
            plagiarismReportDiv.appendChild(sentenceScoresList);
        }


        // grammeryl check **********************************************************
        function checkGrammar(event) {
            event.preventDefault();

            var editorContent = document.getElementById("editor").innerText;

            const settings = {
                async: true,
                crossDomain: true,
                url: 'https://grammarbot.p.rapidapi.com/check',
                method: 'POST',
                headers: {
                    'content-type': 'application/x-www-form-urlencoded',
                    'X-RapidAPI-Key': '4492aeeb6fmsha6bbc224b9ffd5bp15feb1jsnd1e70044c4a5',
                    'X-RapidAPI-Host': 'grammarbot.p.rapidapi.com'
                },
                data: {
                    text: editorContent,
                    language: 'en-US'
                }
            };

            $.ajax(settings).done(function (response) {
                console.log(response)
                displayGrammarReport(response);
            });
        }

        function displayGrammarReport(response) {
            var grammarReportDiv = document.getElementById("grammarReport");
            grammarReportDiv.innerHTML = "";

            // Display results in a list
            var ul = document.createElement("ul");

            response.matches.forEach(function (match) {
                var li = document.createElement("li");
                li.textContent = match.message;
                ul.appendChild(li);
            });

            grammarReportDiv.appendChild(ul);
        }







        // *************************************************************************
        document.addEventListener("DOMContentLoaded", function () {
            const paraphrasingLink = document.getElementById("paraphrasingLink");
            const plagiarismLink = document.getElementById("plagiarismLink");
            const grammarlyLink = document.getElementById("GrammerlyLink");

            const paraphrasingContent = document.getElementById("paraphrasingContent");
            const plagiarismContent = document.getElementById("plagiarismContent");
            const grammarlyContent = document.getElementById("Grammerly");

            // Function to toggle the display of content divs
            function toggleContent(contentToShow) {
                const allContent = [paraphrasingContent, plagiarismContent, grammarlyContent];
                allContent.forEach(content => {
                    if (content === contentToShow) {
                        content.style.display = "block";
                    } else {
                        content.style.display = "none";
                    }
                });
            }

            // Event listener for paraphrasing link
            paraphrasingLink.addEventListener("click", function () {
                toggleContent(paraphrasingContent);
            });

            // Event listener for plagiarism link
            plagiarismLink.addEventListener("click", function () {
                toggleContent(plagiarismContent);
            });

            // Event listener for Grammarly link
            grammarlyLink.addEventListener("click", function () {
                toggleContent(grammarlyContent);
            });

            function toggleContent(contentToShow) {
        const allContent = [paraphrasingContent, plagiarismContent, grammarlyContent];
        allContent.forEach(content => {
            if (content === contentToShow) {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        });
    }

    // Read the URL fragment to determine which section to display
    const sectionToShow = window.location.hash.substr(1);

    // Adjust the section ID to match the div ID
    const adjustedSectionToShow = sectionToShow + "Content";

    // Toggle the content div based on the section
    if (adjustedSectionToShow === 'grammarlyContent') {
        toggleContent(grammarlyContent);
    } else {
        toggleContent(document.getElementById(adjustedSectionToShow));
    }

    // Event listener for paraphrasing link
    paraphrasingLink.addEventListener("click", function () {
        toggleContent(paraphrasingContent);
        plagiarismContent.style.display = "none"; // Hide plagiarism content
        grammarlyContent.style.display = "none"; // Hide grammarly content
    });

    // Event listener for plagiarism link
    plagiarismLink.addEventListener("click", function () {
        toggleContent(plagiarismContent);
        paraphrasingContent.style.display = "none"; // Hide paraphrasing content
        grammarlyContent.style.display = "none"; // Hide grammarly content
    });

    // Event listener for Grammarly link
    grammarlyLink.addEventListener("click", function () {
        toggleContent(grammarlyContent);
        paraphrasingContent.style.display = "none"; // Hide paraphrasing content
        plagiarismContent.style.display = "none"; // Hide plagiarism content
    });
});


        // ********************************************
        function adjustTextareaWidth() {
            var screenWidth = window.innerWidth;
            var textarea = document.getElementById('originalText');
            var maxWidth = 500; // Maximum width for the textarea

            // Calculate the new width based on screen width
            var newWidth = Math.min(screenWidth * 0.9, maxWidth); // You can adjust the factor (0.9) as needed

            // Set the new width to the textarea
            textarea.style.width = newWidth + 'px';
        }

        // Call the adjustTextareaWidth function initially and on window resize
        adjustTextareaWidth();
        window.addEventListener('resize', adjustTextareaWidth);
    </script>
</body>

</html>
