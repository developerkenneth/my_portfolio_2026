<?php

// API endpoint for handling AJAX requests from the admin inquiries page
require_once '../../init/core.php';
require_once ROOT_PATH . '/init/Db.php';

header('Content-Type: application/json');
$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch inquiries from the database
    $stmt = $conn->prepare("SELECT * FROM inquiries ORDER BY created_at DESC");
    $stmt->execute();
    $inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => true, 'data' => $inquiries]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Handle deletion of an inquiry
    parse_str(file_get_contents("php://input"), $deleteData);
    if (isset($deleteData['id'])) {
        $stmt = $conn->prepare("DELETE FROM inquiries WHERE id = :id");
        $stmt->bindParam(':id', $deleteData['id'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete inquiry']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Inquiry ID not provided']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}