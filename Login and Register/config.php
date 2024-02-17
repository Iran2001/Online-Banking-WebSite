<?php

$severname = 'localhost';
$username = 'root';
$password = '';
$database = 'mini_project';

$conn = new mysqli($severname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
} else {
}
?>
