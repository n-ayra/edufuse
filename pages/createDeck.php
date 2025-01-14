<?php include '../include/headergen.html'; ?>
<link rel="stylesheet" href="../css/student.css">
<script src="../js/script.js" defer></script>
</head>

<?php include '../include/navbarStudent.html'; ?>

<div class="container">
    <h1>Create a Deck</h1>
    <hr>
    <div class="controls">
        <button class="create-deck" onclick="window.location.href='homepageStudent.php'">View Decks</button>
    </div>

    <div class="deck-creation">
        <form id="uploadForm" enctype="multipart/form-data">
            <div class="upload-options">
                <label for="fileUpload" class="upload-file">Upload File</label>
                <input type="file" id="fileUpload" name="fileUpload" accept=".txt,.pdf,.doc,.docx" hidden>
                <span>or</span>
                <button type="button" class="select-course">Select from Course</button>
            </div>

            <div class="form-group">
                <label for="deck-name">Deck Name</label>
                <input type="text" id="deck-name" name="deckName" placeholder="Enter deck name">
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Enter name of subject">
            </div>

            <button type="button" id="uploadButton" class="generate-deck">Generate Deck</button>
        </form>
    </div>

    <div id="result">
        <h2>Generated Flashcards</h2>
        <div id="flashcards"></div>
    </div>
</div>
</body>
</html>
