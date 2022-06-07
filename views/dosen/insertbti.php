<?php
include_once '../../Database/Connection.php';
     $nim = $_POST['nim'];
     $ntugas = $_POST['ntugas'];
     $nquiz = $_POST['nquiz'];
     $nuts = $_POST['nuts'];
     $nuas = $_POST['nuas'];
     $kd_matkul = "PT502";
     $sql = "INSERT INTO nilai (npm, kd_matkul, ntugas, nquiz, nuts, nuas) VALUES ('$nim', '$kd_matkul', '$ntugas', '$nquiz', '$nuts', '$nuas')";
     if (mysqli_query($conn, $sql)) {
      echo ("<script LANGUAGE='JavaScript'>
         window.alert('Data Berhasil Disimpan');
         window.location.href='dosen-nilai.php';
         </script>");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
?>