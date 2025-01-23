document.getElementById('uploadButton').addEventListener('click', function () {
    const form = document.getElementById('uploadForm');
    const formData = new FormData(form);

    fetch('../php/uploadFile.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                displayUploadedFile(data.file); // Call function to display the uploaded file
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
});

function displayUploadedFile(file) {
    const flashcardsDiv = document.getElementById('flashcards');

    // Create a new card for the uploaded file
    const fileCard = document.createElement('div');
    fileCard.classList.add('flashcard');

    fileCard.innerHTML = `
        <p><strong>Deck Name:</strong> ${file.deckName}</p>
        <p><strong>Subject:</strong> ${file.subject}</p>
        <p><strong>File Name:</strong> <a href="${file.filePath}" target="_blank">${file.fileName}</a></p>
    `;

    flashcardsDiv.appendChild(fileCard); // Append the card to the flashcards section
}
