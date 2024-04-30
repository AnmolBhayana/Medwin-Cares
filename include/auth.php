<?php
// Hash the password using password_hash
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Verify the password against the hashed password
function verify_password($password, $hash) {
    return password_verify($password, $hash);
}

// Generate a JWT token
function generate_jwt_token($user_id, $expiration_time = 3600) {
    $payload = [
        'iss' => 'your-app-issuer',
        'aud' => 'your-app-audience',
        'iat' => time(),
        'exp' => time() + $expiration_time,
        'data' => [
            'user_id' => $user_id
        ]
    ];
    $jwt = Firebase\JWT\JWT::encode($payload, 'your-secret-key', 'HS256');
    return $jwt;
}
