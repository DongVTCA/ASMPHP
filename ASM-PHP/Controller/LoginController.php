<?php
ob_start();
session_start();

require("../HelperConnection/Connection.php");
if ($conn->connect_error) {
    echo $conn->connect_error;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        if (empty($_POST["username"]) or empty($_POST["password"])) {
            $_SESSION['noteError'] = "Tai Khoan Va Mat Khau Khong Duoc De Trong!";
            header('location:../View/Login.php');
        }
        $query = "select * from dongnvnde18077_users";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            if ($row['email'] === $_POST["username"] && $row['passwords'] === $_POST["password"]) {
                $_SESSION["email"] = $_POST["username"];
                $_SESSION["name"] = $row["firstname"];
                $_SESSION["userlevel"] = $row["userlevel"];
                if ($row["userlevel"] == 1) {
                    header('location: /Index.php');
                    break;
                } else {
                    header('location: ../View/Adminpage.php');
                    break;
                }
            } else {
                $_SESSION['noteError'] = "Tai Khoan Hoac Mat Khau Khong Dung!";
                header('location:../View/Login.php');
            }
        }
    }
}
