<?php
try {
    $DB->delete('materi', ['id_materi' => $idMateri]);
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Hapus data berhasil');
        window.location.href='/dosen';
        </script>");
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
} catch (\Throwable $th) {
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('$th');
        </script>");
    echo $th;
}