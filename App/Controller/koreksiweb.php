<?php
     $nim = $_POST['nim'];
     $ntugas = $_POST['ntugas'];
     $kd_matkul = "RL209";
     $id_tugas = $_POST['id_tugas'];
     $sql = "UPDATE nilai INNER JOIN upload_tugas SET ntugas='$ntugas' WHERE nilai.npm='$nim' && nilai.kd_matkul='$kd_matkul' && upload_tugas.id_tugas='$id_tugas'";
     if (mysqli_query($conn, $sql)) {
      echo ("<script LANGUAGE='JavaScript'>
         window.alert('Data Berhasil Diupdate');
         window.location.href='/koreksi/web';
         </script>");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
?>