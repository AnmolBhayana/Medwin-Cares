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
            $payload = Firebase\JWT\JWT::decode($token, 'your-secret-key', ['HS256']);
            // Token is valid, return the user information
            return $payload->data->user_id;
        } catch (Exception $e) {
            // Token is invalid or expired
            http_response_code(401); // Unauthorized
            die('Access denied. Invalid or expired token.');
        }
    } else {
        http_response_code(401); // Unauthorized
        die('Access denied. No token provided.');
    }
}
