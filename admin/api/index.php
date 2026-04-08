<?php

// API endpoint for handling AJAX requests from the admin inquiries page
require_once '../../init/core.php';
require_once ROOT_PATH . '/init/Database.php';

header('Content-Type: application/json');
$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $page = 1;
    $limit = 10;

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        if (is_numeric($_GET['page'])) {
            $page = (int) $_GET['page'];
        }
    }

    $offset = ($page - 1) * $limit;


    try {

        // fetching total pages 
        $fetch_stmt = $conn->query("SELECT COUNT(*) FROM inquiries ");
        $row_count = $fetch_stmt->fetchColumn();
        $total_pages = ceil($row_count / $limit);


        // Fetch inquiries from the database
        $stmt = $conn->prepare("SELECT * FROM inquiries ORDER BY created_at DESC LIMIT :limit OFFSET :offset");

        // 2. Explicitly tell PDO these are Integers
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();
        $inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode([
            'success' => true,
            'data' => $inquiries,
            'page' => (int) $page,
            'total_pages' => (int) $total_pages
        ]);
    } catch (\PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
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
