<?php
require_once 'auth.php'; // Include the file containing the generate_jwt_token function
require_once 'User.php'; // Include the file containing the User class and verifyPassword method
require_once 'UserModel.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = getUserByUsername($username); // Get the user from the database

if ($user && $user->verifyPassword($password)) {
    $token = generate_jwt_token($user->id);
    // Store the token in a secure cookie or localStorage
    setcookie('auth_token', $token, time() + 3600, '/', '', true, true);
    // ... redirect to dashboard or home page
} else {
    // ... handle invalid credentials
}