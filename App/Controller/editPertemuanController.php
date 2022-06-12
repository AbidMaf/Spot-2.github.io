<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pertemuan = $_POST['pertemuan'];
    $materi = $_POST['materi'];
    $judul = $_POST['judul'];
    $highlight = $_POST['highlight'];

    try {
        $DB->update('materi', [
            'judul' => $judul, 
            'deskripsi' => $materi, 
            'highlight' => $highlight,
            'last_update' => date('Y-m-d H:i:s')
        ], 
        [
            'pertemuan' => $pertemuan, 
            'kd_matkul' => $kodeMatkul
        ]);
        echo ("<script LANGUAGE='JavaScript'>
         window.alert('Ubah data berhasil');
         window.location.href='/dosen';
         </script>");
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
         exit;
    } catch (\Throwable $th) {
        echo ("<script LANGUAGE='JavaScript'>
         window.alert('$th');
         window.location.href='/dosen';
         </script>");
         echo $th;
    }
}