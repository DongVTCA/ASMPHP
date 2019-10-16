<?php
ob_start();
session_start();
require("../HelperConnection/Connection.php");
if ($conn->connect_error) {
    die("Connected Error: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES['PImage']["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["Add"])) {
        if (empty($_POST["PName"]) or empty($_POST["PPrice"]) or empty($_FILES["PImage"])) {
            $_SESSION["errorAdd"] = "Cac truong khong duoc bo trong!";
        }
        if ($_POST["sale"] < 0 or $_POST["sale"] > 100) {
            $_SESSION["sale"] = "sale is 0-100";
        }
        $info = $_FILES['PImage']["tmp_name"];
        $check = getimagesize($info);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES['PImage']["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // $Desciption = $_POST["description"];
    // $price = $_POST["price"];
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES['PImage']["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES['PImage']["name"]) . " has been uploaded.";
            $sql = "INSERT INTO dongnvnde18077_products(pname,pimage,price,sale)";
            $sql .= "VALUES(?, ?, ?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdi", $_POST["PName"], $target_file, $_POST["PPrice"], $_POST["sale"]);
            if ($stmt->execute()) {
                header('Location:../View/Adminpage.php');
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
