<?php
// Include the database connection
require_once '../php/connection.php'; // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $deckName = $_POST['deckName'];
    $subject = $_POST['subject'];

    // Check if a file was uploaded
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
        // File info
        $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
        $fileName = $_FILES['fileUpload']['name'];
        $fileSize = $_FILES['fileUpload']['size'];
        $fileType = $_FILES['fileUpload']['type'];
        
        // Define the target directory and file path
        $uploadDir = "../uploads/"; // Ensure this directory exists
        $targetFilePath = $uploadDir . basename($fileName);

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
            // Insert file info into the database
            $stmt = $conn->prepare("INSERT INTO uploaded_files (deck_name, subject, file_name, file_path, file_size, file_type) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $deckName, $subject, $fileName, $targetFilePath, $fileSize, $fileType);
            
            if ($stmt->execute()) {
                // Return a success response
                echo json_encode(['success' => true, 'message' => 'File uploaded and deck generated successfully!', 'file' => [
                    'deckName' => $deckName,
                    'subject' => $subject,
                    'fileName' => $fileName,
                    'filePath' => $targetFilePath,
                    'fileSize' => $fileSize,
                    'fileType' => $fileType
                ]]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Database insertion failed: ' . $conn->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Error moving uploaded file.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No file uploaded or file error.']);
    }

    // Close the database connection
    $conn->close();
}
?>
