<?php

    try {
        $DB->delete('tugas', ['id_materi' => $idMateri]);
        echo ("<script LANGUAGE='JavaScript'>
         window.alert('Hapus tugas berhasil');
         window.location.href='/dosen';
         </script>");
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
    } catch (\Throwable $th) {
        echo $th;
    }