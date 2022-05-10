<?php

// $me = "D:\Document\Materi\Semester 4\Pemrograman Web\8 (UTS)\Spot-2";
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/dashboard':
    case '/':
        require "views/mahasiswa/dashboard.php";
        break;
    
    case '/Login':
        require "views/login.php";
        break;
    
    case '/MataKuliah':
        require "views/mahasiswa/daftarMataKuliah.php";
        break;
    
    case '/Tugas':
        require "views/mahasiswa/tugas.php";
        break;
    
    case '/Nilai':
        require "views/mahasiswa/summaryNilai.php";
        break;
    
    default:
        http_response_code(404);
        echo $request;
        break;
}