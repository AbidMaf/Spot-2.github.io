<?php

$conn = new mysqli("localhost", "root", "", "penilaian-app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

