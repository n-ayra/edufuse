<?php
// Include database connection
include '../php/connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check for required fields
    if (!isset($_FILES['file']) || !isset($_POST['deckName']) || !isset($_POST['subject'])) {
        echo json_encode(['error' => 'Missing required fields.']);
        exit;
    }

    $file = $_FILES['file'];
    $deckName = trim($_POST['deckName']);
    $subject = trim($_POST['subject']);

    // Validate file upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['error' => 'Error uploading the file.']);
        exit;
    }

    // Validate file type (only allow .txt files for simplicity)
    $allowedTypes = ['text/plain'];
    if (!in_array($file['type'], $allowedTypes)) {
        echo json_encode(['error' => 'Invalid file type. Only .txt files are allowed.']);
        exit;
    }

    // Save the uploaded file in the uploads directory
    $uploadDir = '../uploads/';
    $uploadPath = $uploadDir . basename($file['name']);

    if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
        echo json_encode(['error' => 'Failed to save the uploaded file.']);
        exit;
    }

    // Read and process the file content
    $content = file_get_contents($uploadPath);
    $lines = explode("\n", $content);
    $flashcards = [];

    foreach ($lines as $line) {
        $parts = explode(':', $line, 2); // Example: Split by colon for question:answer pairs
        if (count($parts) === 2) {
            $flashcards[] = [
                'question' => htmlspecialchars(trim($parts[0])),
                'answer' => htmlspecialchars(trim($parts[1]))
            ];
        }
    }

    if (empty($flashcards)) {
        echo json_encode(['error' => 'No valid flashcards found in the file.']);
        exit;
    }

    // Optionally save to database (placeholder for future implementation)
    // $stmt = $conn->prepare("INSERT INTO decks (name, subject) VALUES (?, ?)");
    // $stmt->bind_param('ss', $deckName, $subject);
    // $stmt->execute();

    // Respond with the generated flashcards
    echo json_encode(['flashcards' => $flashcards]);
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}