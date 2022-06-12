<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $deadline = date('Y-m-d H:i:s', strtotime($_POST['deadline']));

    try {
        $DB->insert('tugas', ['', $judul, $deskripsi, $deadline, $idMateri]);
        echo ("<script LANGUAGE='JavaScript'>
         window.alert('Tambah tugas berhasil');
         window.location.href='/dosen';
         </script>");
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
    } catch (\Throwable $th) {
        echo $th;
    }
}