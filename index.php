<?php

use Connection\ConnectionDB;
use Connection\database;

// $me = "D:\Document\Materi\Semester 4\Pemrograman Web\8 (UTS)\Spot-2";
$request = $_SERVER['REQUEST_URI'];

include "config/database.php";

// Note: to add more case, use lowercase
switch (strtolower($request)) {
    case '/dashboard':
    case '/':
        require "views/mahasiswa/dashboard.php";
        break;
    
    case '/login':
        require "views/login.php";
        break;

    case '/loginaction':
        require "controller/loginController.php";
        break;
    
    case '/mataKuliah':
        require "views/mahasiswa/daftarMataKuliah.php";
        break;
    
    case '/tugas':
        require "views/mahasiswa/tugas.php";
        break;
    
    case '/nilai':
        require "views/mahasiswa/summaryNilai.php";
        break;
    
    default:
        http_response_code(404);
        echo $request;
        break;
}