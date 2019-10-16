<?php
ob_start();
session_start();

require("../HelperConnection/Connection.php");
if ($conn->connect_error) {
    echo $conn->connect_error;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        if (
            empty($_POST["firstname"]) or empty($_POST["lastname"]) or empty($_POST["email"])
            or empty($_POST["password"]) or empty($_POST["repassword"])
        ) {
            $_SESSION["emptyerr"] = "Cac truong khong duoc bo trong";
        }
        $email = $_POST["email"];
        $pass = $_POST["repassword"];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $query = "select * from dongnvnde18077_users";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            if ($row['email'] === $_POST["email"]) {
                $_SESSION["accerr"] = "Da co tai khoan nay roi,vui long nhap email khac";
                break;
            } else {
                $query = "INSERT INTO dongnvnde18077_users (email,passwords,firstname,lastname,userlevel)";
                $query .= "VALUES('$email','$pass','$fname','$lname',1)";
                if ($conn->query($query)) {
                    $_SESSION["registerpass"] = "Dang ky thanh cong!";
                    header('location: ../View/Login.php');
                    break;
                } else {
                    $_SESSION["errregister"] = "Loi vui long thu lai";
                    break;
                }
            }
        }
    }
}
?>
