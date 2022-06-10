<?php
     $nim = $_POST['nim'];
     $ntugas = $_POST['ntugas'];
     $nquiz = $_POST['nquiz'];
     $nuts = $_POST['nuts'];
     $nuas = $_POST['nuas'];
     $kd_matkul = "PT502";
     $sql = "UPDATE nilai SET ntugas='$ntugas', nquiz='$nquiz', nuts='$nuts', nuas='$nuas' WHERE npm='$nim' && kd_matkul='$kd_matkul'";
     if (mysqli_query($conn, $sql)) {
      echo ("<script LANGUAGE='JavaScript'>
         window.alert('Data Berhasil Diupdate');
         window.location.href='/dosen-nilai';
         </script>");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
?>