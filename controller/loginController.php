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
        }elseif ($row["level"] == "dosen") {
            $sql = "SELECT * FROM dosen WHERE nid = '$username'";

            $_SESSION["npm"] = $row["npm"];
            $_SESSION["name"] = $row["name"];
            header("Location: /dashboardDosen");
        }
    }else{
        $row = $result->fetch_assoc();
        while($row) {
            $row["id_user"]. " " . $row["username"]. " " . $row["password"]. " " . $row["level"];
        }
        echo "Username atau password salah ";
        echo $password . " " . $username;
    }
}

// Check input if contains special character
function inputValidation($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}