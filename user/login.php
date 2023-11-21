<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = "your_username"; // Replace with your actual username
    $password = "your_password"; // Replace with your actual password

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username === $username && $input_password === $password) {
        $_SESSION['user'] = $username;
        echo $username; // Return just the username
    } else {
        echo "Invalid credentials";
    }
}
