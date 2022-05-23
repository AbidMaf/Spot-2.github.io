<?php

// $me = "D:\Document\Materi\Semester 4\Pemrograman Web\8 (UTS)\Spot-2";

use App\helper;
use Database\Query;

$request = $_SERVER['REQUEST_URI'];

require_once realpath("vendor/autoload.php");

include "Database/Connection.php";

$helper = new helper();
$DB = new Query();

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
        require "<App>Controller/loginController.php";
        break;
    
    case '/matakuliah':
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