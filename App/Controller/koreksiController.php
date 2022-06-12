<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $nim = $_POST['nim'];
      $nilai = $_POST['nilai'];
      $kd_matkul = "RL209";
      $id_up_tugas = $idUpTugas;
      $sql = "UPDATE upload_tugas SET nilai='$nilai' WHERE id_up_tugas='$idUpTugas'"; 
     if (mysqli_query($conn, $sql)) {
      echo ("<script LANGUAGE='JavaScript'>
         window.alert('Data Berhasil Diupdate');
         window.location.href='/koreksi/pbo';
         </script>");
      $_SESSION['success'] = TRUE;
      header('Location: ' . $_SERVER["HTTP_REFERER"] );
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
   }
?>