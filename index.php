<?php

// $me = "D:\Document\Materi\Semester 4\Pemrograman Web\8 (UTS)\Spot-2";

use App\helper;
use Database\Query;

$request = $_SERVER['REQUEST_URI'];

require_once realpath("vendor/autoload.php");

include "Database/Connection.php";

$helper = new helper();
$DB = new Query();
$parseURL = explode("/", strtolower(parse_url($request, PHP_URL_PATH)));

$helper->checkSession();
// Note: to add more case, use lowercase
switch (strtolower($request)) {    
    case '/login':
        require "views/login.php";
        break;

    case '/loginaction':
        require "App/Controller/loginController.php";
        break;

    case '/logout':
        require "App/Controller/logoutController.php";
        break;

    case '/dashboard':
    case '/':
        require "views/mahasiswa/dashboard.php";
        break;

    case '/changeavatar':
        require "App/Controller/changeAvatarController.php";
        break;

    case '/matakuliah':
        require "views/mahasiswa/daftarMataKuliah.php";
        break;

    case '/matakuliah/' . (!empty($parseURL[2]) ? $parseURL[2] : ''):
        $kodeMatkul = $parseURL[2];
        require "views/mahasiswa/pertemuan.php";
        break;

    case '/matakuliah/' . (!empty($parseURL[2]) ? $parseURL[2] : '') . '/' . (!empty($parseURL[3]) ? $parseURL[3] : ''):
        $kodeMatkul = $parseURL[2];
        $idMateri = $parseURL[3];
        require "views/mahasiswa/materi.php";
        break;
    
    case '/uploadtugas':
        require $_SERVER['DOCUMENT_ROOT'] . "/App/Controller/uploadTugasController.php";
        break;
    
    case '/deleteuploadtugas/' . (!empty($parseURL[2]) ? $parseURL[2] : ''):
        $kdUpTugas = $parseURL[2];
        require $_SERVER['DOCUMENT_ROOT'] . "/App/Controller/deleteUploadTugasController.php";
        break;

    case '/tugas':
        require "views/mahasiswa/tugas.php";
        break;
    
    case '/nilai':
        require "views/mahasiswa/summaryNilai.php";
        break;
    
    case '/dosen':
        require "views/dosen/dosen.php";
        break;
    
    case '/dosen-nilai':
        require "views/dosen/dosen-nilai.php";
        break;

    default:
        http_response_code(404);
        // echo $request;
        require "views/404.php";
        break;
}