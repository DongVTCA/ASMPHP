<?php
require("../HelperConnection/Connection.php");
if ($conn->connect_error) {
    die("Connected Error: " . $conn->error);
}
$target_dir = "upload/";
$fileimg = "";
$id = $_GET["id"];
$query = "select * from dongnvnde18077_products where id= ?";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $fileimg = $row["pimage"];
    $fileimg = $target_dir . $fileimg;
}
$query = "delete from dongnvnde18077_products where id= ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
if ($stmt->execute() === true) {
    header('Location: ../View/Adminpage.php');
    if (file_exists($fileimg)) {
        unlink($fileimg);
        header('Location: ../View/Adminpage.php');
    }
} else {
    echo "Delete Failed";
}
