<?php

try {
    $conn = new mysqli("localhost", "root", "", "penilaian-app");
    date_default_timezone_set("Asia/Bangkok");
} catch (\Throwable $th) {
    die(require "views/no-connection.php");
}
