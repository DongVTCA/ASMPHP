<?php
ob_start();
$id =  $_GET["id"];
require("../HelperConnection/Connection.php");
$query = "select * from dongnvnde18077_products where id=$id";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
} else {
    echo "Not Found !";
}
$desciption = $_POST["ProductName"];
$price = $_POST["ProductPrice"];
$productID = $id;
$productImage = $_POST["ProductImage"];
if (isset($_POST["Edit"])) {
    $check = getimagesize($_FILES["ProductImage"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
$target_dir = "upload/";
$desciption = $_POST["ProductName"];
$price = $_POST["ProductPrice"];
$productID = $id;
$target_file = $target_dir . basename($_FILES["ProductImage"]["name"]);
$uploadOk = 1;
$productImage  = $target_file;

$sql = "UPDATE dongnvnde18077_products set pname = ?,pimage = ?,price = ?,sale = ? where id = ?";
if($stmt = $conn->prepare($sql))
{
    $stmt->bind_param("ssdii",$desciption, $productImage, $price, $_POST["sale"], $productID);
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    @unlink($target_file);
}
// Check file size
if ($_FILES["ProductImage"]["size"] > 500000) {
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

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
}
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image


if (isset($_POST["Edit"])) {
    if ($stmt->execute()) {
        move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file);
        echo "The file " . $target_file . basename($_FILES["ProductImage"]["name"]) . " has been uploaded.";
        $stmt->close();
        header('Location: http://dongnvnde18077.atwebpages.com/ASM-PHP/View/Adminpage.php');
    } else {
        echo "Update Failed";
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}
ob_end_flush();
