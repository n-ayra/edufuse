<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deckName = $_POST['deckName'];
    $subject = $_POST['subject'];
    $file = $_FILES['fileUpload'];

    require_once '../database/connection.php';

    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database_name');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // File upload handling
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO uploaded_files (deck_name, subject, file_name, file_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $deckName, $subject, $file['name'], $targetFile);
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'File uploaded successfully!',
                'file' => [
                    'deckName' => $deckName,
                    'subject' => $subject,
                    'fileName' => $file['name'],
                    'filePath' => $targetFile,
                ]
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to upload file.']);
    }

    $conn->close();
}
?>

