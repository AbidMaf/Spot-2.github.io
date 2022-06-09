<?php

$username = $password = $level = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = inputValidation($_POST["username"]);
    $password = inputValidation($_POST["password"]);
    
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row["level"] == "mahasiswa"){
            $sql = "SELECT * FROM mahasiswa WHERE npm = '$username'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $_SESSION["npm"] = $row["npm"];
            $_SESSION["name"] = $row["name"];
            header("Location: /dashboard");
        }elseif($row["level"] == "dosen") {
            $sql = "SELECT * FROM dosen WHERE nid = '$username'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $_SESSION["nid"] = $row["nid"];
            $_SESSION["name"] = $row["name"];
            header("Location: /dosen");
        } else {
            print_r($row["level"]);
        }
    }else{
        $_SESSION["error"] = "Username atau Password salah!";
        header("location: /login");
    }
}

// Check input if contains special character
function inputValidation($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}