document.getElementById('uploadButton').addEventListener('click', async () => {
    const formData = new FormData();
    const fileInput = document.getElementById('fileUpload');
    const deckName = document.getElementById('deck-name').value.trim();
    const subject = document.getElementById('subject').value.trim();

    // Validate input fields
    if (fileInput.files.length === 0) {
        alert("Please select a file to upload!");
        return;
    }

    if (!deckName) {
        alert("Please provide a deck name!");
        return;
    }

    if (!subject) {
        alert("Please provide a subject!");
        return;
    }

    // Append data to form
    formData.append('file', fileInput.files[0]);
    formData.append('deckName', deckName);
    formData.append('subject', subject);

    try {
        // Send data to the backend
        const response = await fetch('php/deck_process.php', {
            method: 'POST',
            body: formData
        });

        // Parse response
        const data = await response.json();

        // Handle response
        const flashcardsDiv = document.getElementById('flashcards');
        flashcardsDiv.innerHTML = ''; // Clear previous flashcards

        if (data.error) {
            flashcardsDiv.innerHTML = `<p>Error: ${data.error}</p>`;
        } else {
            data.flashcards.forEach(card => {
                const cardElement = document.createElement('div');
                cardElement.classList.add('flashcard');
                cardElement.innerHTML = `
                    <div class="question">Q: ${card.question}</div>
                    <div class="answer">A: ${card.answer}</div>
                `;

                // Flip interaction
                cardElement.addEventListener('click', () => {
                    cardElement.classList.toggle('flipped');
                });

                flashcardsDiv.appendChild(cardElement);
            });
        }
    } catch (err) {
        console.error('Error:', err);
        alert('Something went wrong. Please try again.');
    }
});