document.querySelector('.custom-upload-button').addEventListener('click', function () {
    document.getElementById('fileUpload').click();
});

document.getElementById('fileUpload').addEventListener('change', function () {
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    if (this.files && this.files.length > 0) {
        fileNameDisplay.textContent = this.files[0].name; // Display the file name
    } else {
        fileNameDisplay.textContent = "No file chosen"; // Default message
    }
});
