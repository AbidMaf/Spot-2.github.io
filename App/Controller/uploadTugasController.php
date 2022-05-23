<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $npm = $_POST["npm"];
    $id_tugas = $_POST["id_tugas"];
    $kd_matkul = $_POST["kd_matkul"];

    $dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/tugas/";
    $temp = explode(".", $_FILES["formfile"]["name"]);
    $newfilename = $id_tugas . "_" . $npm . "." . end($temp);

    $target_file = $dir . $newfilename;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(move_uploaded_file($_FILES["formfile"]["tmp_name"], $target_file)) {
        $DB->insert('upload_tugas', ["", $npm, $id_tugas, $kd_matkul, $newfilename, '0']);
        // header('location:javascript://history.go(-1)');
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
else {
    echo "what?";
}