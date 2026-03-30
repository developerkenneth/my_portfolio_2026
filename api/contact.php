<?php
require_once '../init/core.php';
require_once ROOT_PATH . '/init/Db.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => "Method not allowed: " . $_SERVER['REQUEST_METHOD']]);
    exit();
}

// Get the JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Check if JSON is valid
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
    exit();
}

// Validate required fields
$required_fields = ['name', 'email', 'message'];
$missing_fields = [];

foreach ($required_fields as $field) {
    if (!isset($data[$field]) || empty(trim($data[$field]))) {
        $missing_fields[] = $field;
    }
}

if (!empty($missing_fields)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing required fields: ' . implode(', ', $missing_fields)]);
    exit();
}

// Validate email format
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email format']);
    exit();
}

// Sanitize input
$name = htmlspecialchars(trim($data['name']), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars(trim($data['message']), ENT_QUOTES, 'UTF-8');

// Prepare contact data
$contact_data = [
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
];


try {
    $db = new Database();
    $conn = $db->getConnection();

    // Ensure PDO is set to throw exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO inquiries (`name`, `email`, `message`, `ip_address`) VALUES (:name, :email, :message, :ip_address)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $contact_data['name']);
    $stmt->bindParam(':email', $contact_data['email']);
    $stmt->bindParam(':message', $contact_data['message']);
    $stmt->bindParam(':ip_address', $contact_data['ip_address']);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Success']);
        exit();
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while processing your request'
    ]);
    exit();
}

