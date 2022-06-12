<?php
$sql = "UPDATE  nilai SET nquiz = 0, nuts = 0, nuas = 0 WHERE npm = '$nim' && kd_matkul = '$kd_matkul'";
$delete = mysqli_query($conn, $sql);
if ($delete) {
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Data Berhasil Dihapus');
        window.location.href='/dosen-nilai';
        </script>");
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
?>