<?php
      $nim = $_POST['nim'];
      $nilai = $_POST['nilai'];
      $kd_matkul = "RL209";
      $id_up_tugas = $_POST['id_up_tugas'];
      $sql = "UPDATE upload_tugas SET nilai='$nilai' WHERE npm='$nim' && kd_matkul='$kd_matkul' && id_up_tugas='$id_up_tugas'";
     if (mysqli_query($conn, $sql)) {
      echo ("<script LANGUAGE='JavaScript'>
         window.alert('Data Berhasil Diupdate');
         window.location.href='/koreksi/pbo';
         </script>");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
?>