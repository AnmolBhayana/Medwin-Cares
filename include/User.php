<?php
class User {
    public $id;
    public $username;
    public $password_hash; // Store the hashed password

    public function setPassword($password) {
        $this->password_hash = hash_password($password);
    }

    public function verifyPassword($password) {
        return verify_password($password, $this->password_hash);
    }
}