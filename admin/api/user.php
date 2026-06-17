<?php
require_once dirname(dirname(__DIR__)) . "/init/core.php";
include_once ROOT_PATH . "/model/User.php";
include_once ROOT_PATH . "/init/Auth.php";


header("Content-Type:application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");



// check if the user is logged in before update

if (Auth::is_loggedin() === false) {
    http_response_code(401);
    echo json_encode([
        'message' => 'unauthorized request',
        'success' => false
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "PATCH" || $_SERVER['REQUEST_METHOD'] === "PUT") {
    $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, true);



    if (empty($data)) {
        http_response_code(400);
        echo json_encode([
            "message" => "fields cannot be empty.",
            "success" => false
        ]);
        exit;
    }


    // checking for wrong fields and empty fields
    $requiredFields = ['password', 'username', 'email', 'name', 'id'];
    $emptyFields = "";
    $unallowed = '';

    foreach ($data as $field => $value) {
        if (in_array($field, $requiredFields) && empty($value)) {
            $emptyFields .= "$field, ";
        }

        if (in_array($field, $requiredFields) === false) {
            $unallowed .= "$field";
        }
    }

    if (!empty($emptyFields)) {
        http_response_code(400);
        echo json_encode([
            'message' => "the following fields cannot be empty: $emptyFields",
            'success' => false
        ]);
        exit;
    }

    if (!empty(strlen(trim($unallowed)))) {
        http_response_code(400);
        echo json_encode([
            'message' => "this field (s) are not allowed: $unallowed",
            'success' => false
        ]);
        exit;
    }

    if (!isset($data['id']) || empty($data['id'])) {
        http_response_code(400);
        echo json_encode([
            'message' => "please provide a user id",
            'success' => false
        ]);
        exit;
    }

    $userId = $data['id'];
    unset($data['id']);
    // udate user
    $result = User::update($data, $userId);
    $statusCode = $result['status'];
    http_response_code($statusCode);
    unset($result['status']);
    echo json_encode($result);
}
