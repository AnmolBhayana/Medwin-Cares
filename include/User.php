<?php
require_once 'vendor/autoload.php'; // Include the Composer autoloader
require_once 'auth.php'; // Include the auth.php file with JWT generation/verification functions

function verifyToken() {
    $token = null;

    // Check if the token is provided in the Authorization header or as a query parameter
    $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? null;
    $queryToken = $_GET['token'] ?? null;

    // Extract the token value
    $bearerToken = isset($authHeader) ? explode(' ', $authHeader)[1] : null;
    $token = $bearerToken ?? $queryToken;

    if ($token) {
        try {
            $secretKey = 'your-secret-key';
            $payload = (array) Firebase\JWT\JWT::decode($token, new Firebase\JWT\Key($secretKey, 'HS256'));
            // Debug statement: Output the received token
            echo "Received Token: " . $token . "\n";
            // Debug statement: Output the decoded payload
            echo "Decoded Payload: ";
            var_dump($payload);
            // Access the user_id value based on the payload structure
            $userId = $payload['user_id'] ?? null;
            if ($userId) {
                return $userId;
            } else {
                throw new Exception('User ID not found in the token payload.');
            }
        } catch (Exception $e) {
            // Token is invalid or an error occurred during decoding
            http_response_code(401); // Unauthorized
            die('Access denied. ' . $e->getMessage());
        }
    } else {
        http_response_code(401); // Unauthorized
        die('Access denied. No token provided.');
    }
}