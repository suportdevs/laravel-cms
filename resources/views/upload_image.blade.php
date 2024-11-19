<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['upload'])) {
        $uploadDir = 'media/';
        $file = $_FILES['upload'];
        $fileName = uniqid() . '_' . time() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $filePath = $uploadDir . $fileName;

        // Move the uploaded file
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $filePath;

            // Return JSON response
            echo json_encode([
                'uploaded' => 1,
                'fileName' => $fileName,
                'url' => $url
            ]);
            exit;
        } else {
            echo json_encode(['uploaded' => 0, 'error' => ['message' => 'Failed to move uploaded file.']]);
            exit;
        }
    } else {
        echo json_encode(['uploaded' => 0, 'error' => ['message' => 'No file uploaded.']]);
        exit;
    }
} else {
    echo json_encode(['uploaded' => 0, 'error' => ['message' => 'Invalid request method.']]);
    exit;
}
?>
