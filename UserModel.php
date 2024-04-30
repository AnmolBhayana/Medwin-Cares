<?php
// UserModel.php or UserRepository.php

require_once 'database.php'; // Include the file that establishes the database connection

function getUserByUsername($username) {
    global $pdo; // Assuming the $pdo object is defined in the database.php file

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if ($user) {
        return $user;
    }

    return null;
}