<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    $level = $_SESSION['level'];
    $reference = ($level == "mahasiswa") ? $_SESSION['npm'] : $_SESSION['nid'];
    
    $dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/image/profile";
    $fileType = strtolower(pathinfo($_FILES['upload-image']['name'], PATHINFO_EXTENSION));
    $temp = explode(".", $_FILES["upload-image"]["name"]);
    $newfilename = "profile_" . $reference . ".png";
    $uploadOk = 0;

    $check = getimagesize($_FILES["upload-image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "file bukan image";
        $uploadOk = 0;
    }

    if(in_array($fileType, $allowed)) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    if($uploadOk == 1) {
        if($level == "mahasiswa") {
            if(move_uploaded_file($_FILES["upload-image"]["tmp_name"], $dir . "/" . $newfilename)) {
                $DB->update('mahasiswa', ['avatar' => $newfilename], ['npm' => $reference]);
                echo $newfilename;
                exit;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        elseif($level == "dosen") {
            if(move_uploaded_file($_FILES["upload-image"]["tmp_name"], $dir . "/" . $newfilename)) {
                $DB->update('dosen', ['avatar' => $newfilename], ['nid' => $reference]);
                echo $newfilename;
                exit;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
    }
}
