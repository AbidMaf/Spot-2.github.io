<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $npm = $_POST["npm"];
    $id_tugas = $_POST["id_tugas"];
    $kd_matkul = $_POST["kd_matkul"];

    $dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/tugas/";
    $temp = explode(".", $_FILES["formfile"]["name"]);
    $newfilename = $id_tugas . "_" . $npm . "_" . $_FILES["formfile"]["name"];

    $target_file = $dir . $newfilename;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $checkUpload = $DB->table("upload_tugas")->where("id_tugas", $id_tugas)->where("npm", $npm)->get();

    if(move_uploaded_file($_FILES["formfile"]["tmp_name"], $target_file)) {
        if ($checkUpload->count() < 1) {
            // echo $checkUpload->count();
            $DB->insert('upload_tugas', ["", $npm, $id_tugas, $kd_matkul, $newfilename, '0', date('Y-m-d H:i:s')]);
        } else {
            $getOldData = $checkUpload->fetch();
            $oldFile = $getOldData[0]["file"];
            unlink($dir . $oldFile);
            $DB->update('upload_tugas', ['file' => $newfilename, 'last_updated' => date('Y-m-d H:i:s'), 'nilai' => '0'], ['npm' => $npm, 'id_tugas' => $id_tugas]);
        }
        
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