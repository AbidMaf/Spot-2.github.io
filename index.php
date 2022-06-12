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

    case '/koreksi':
        require "views/dosen/koreksi.php";
        break;

    case '/koreksi/bti':
        require "views/dosen/koreksi-bti.php";
        break;

    case '/koreksi/web':
        require "views/dosen/koreksi-web.php";
        break;

    case '/dosen':
        require "views/dosen/dosen.php";
        break;
    
    case '/dosen-nilai':
        require "views/dosen/dosen-nilai.php";
        break;

    case '/insertweb':
        require "App/Controller/insertweb.php";
        break;

    case '/editweb':
        require "App/Controller/editweb.php";
        break;

    case '/editbti':
        require "App/Controller/editbti.php";
        break;

    case '/koreksiweb':
        require "App/Controller/koreksiweb.php";
        break;   
    
    case '/koreksibti':
        require "App/Controller/koreksibti.php";
        break;  

    case '/insertbti':
        require "App/Controller/insertbti.php";
        break;

    case '/deleteweb/' . (!empty($parseURL[2]) ? $parseURL[2] : ''):
        $nim = $parseURL[2];
        require $_SERVER['DOCUMENT_ROOT'] . "/App/Controller/deleteweb.php";
        break;
        
    case '/deletebti/' . (!empty($parseURL[2]) ? $parseURL[2] : ''):
        $nim = $parseURL[2];
        require $_SERVER['DOCUMENT_ROOT'] . "/App/Controller/deletebti.php";
        break;

    case '/noconnection':
        require "views/no-connection.php";
        break;

    default:
        http_response_code(404);
        // echo $request;
        require "views/404.php";
        break;
}