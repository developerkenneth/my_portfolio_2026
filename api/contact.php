<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => "Method not allowed".$_SERVER['REQUEST_METHOD'] ]);
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
$timestamp = isset($data['timestamp']) ? $data['timestamp'] : date('c');

// Prepare contact data
$contact_data = [
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'timestamp' => $timestamp,
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
];

// Save to file (for demonstration - in production, use database)
$filename = __DIR__ . '/../data/contacts.json';

// Create data directory if it doesn't exist
$data_dir = dirname($filename);
if (!is_dir($data_dir)) {
    mkdir($data_dir, 0755, true);
}

// Read existing contacts
$contacts = [];
if (file_exists($filename)) {
    $existing_data = file_get_contents($filename);
    $contacts = json_decode($existing_data, true) ?: [];
}

// Add new contact
$contacts[] = $contact_data;

// Save back to file
if (file_put_contents($filename, json_encode($contacts, JSON_PRETTY_PRINT))) {
    // In a real application, you might send an email here
    // mail('your-email@example.com', 'New Contact Form Submission', "Name: $name\nEmail: $email\nMessage: $message");

    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Contact form submitted successfully',
        'data' => $contact_data
    ]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to save contact data']);
}
?>