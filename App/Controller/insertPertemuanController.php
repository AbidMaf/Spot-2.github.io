<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pertemuan = $_POST['pertemuan'];
    $materi = $_POST['materi'];
    $judul = $_POST['judul'];
    $highlight = $_POST['highlight'];

    $checkPertemuan = $DB->table('materi')->where('pertemuan', $pertemuan)->where('kd_matkul', $kodeMatkul)->get();
    if($checkPertemuan->count() > 0) {
        echo ("<script LANGUAGE='JavaScript'>
         window.alert('Pertemuan sudah ada');
         window.location.href='/dosen';
         </script>");
         exit;
    } else {
        $DB->insert('materi', ['', $kodeMatkul, $pertemuan, $judul, $highlight, $materi, date('Y-m-d H:i:s')]);
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
    }
}