<?php
$connection = new mysqli("localhost", "root", "", "signin_signup_db", 3307);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    session_start();
}
