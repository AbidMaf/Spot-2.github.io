<?php
$sql = "DELETE FROM nilai WHERE npm = '$nim' && kd_matkul = 'PT502'";
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