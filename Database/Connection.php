<?php

try {
    $conn = new mysqli("localhost", "root", "", "penilaian-app");
} catch (\Throwable $th) {
    die("Connection failed: " . $th);
}
