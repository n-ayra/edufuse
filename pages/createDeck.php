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
        <form id="uploadForm" enctype="multipart/form-data" method="POST" action="../php/uploadFile.php">
            <!-- File Upload Section -->
            <div class="upload-options">
                <div class="file-upload-container">
                    <!-- Hidden file input -->
                    <input type="file" id="fileUpload" name="fileUpload" accept=".txt,.pdf,.doc,.docx" required>
                    
                    <!-- Custom file upload button -->
                    <label for="fileUpload" class="custom-upload-button">Choose File</label>
                    
                    <!-- Display file name -->
                    <p id="fileNameDisplay" class="file-name">No file chosen</p>
                </div>
            </div>
            <!-- Deck Name and Subject Inputs -->
            <div class="form-group">
                <label for="deck-name">Deck Name</label>
                <input type="text" id="deck-name" name="deckName" placeholder="Enter deck name" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
            </div>
            <button type="submit" class="generate-deck">Generate Deck</button>
        </form>
    </div>

    <div id="result">
        <h2>Generated Flashcards</h2>
        <div id="flashcards"></div>
    </div>
</div>

</body>
</html>
