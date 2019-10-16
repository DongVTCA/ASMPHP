<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="../Css/styleform.css">
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <form action="http://dongnvnde18077.atwebpages.com/ASM-PHP/Controller/Register.php" method="post">
            <div class="component">
                <div class="col-3">
                    <label for="fname">First Name</label>
                </div>
                <div class="col-7">
                    <input type="text" name="firstname">
                </div>
                <div class="clear"></div>
            </div>
            <div class="component">
                <div class="col-3">
                    <label for="lname">Last Name</label>
                </div>
                <div class="col-7">
                    <input type="text" name="lastname">
                </div>
                <div class="clear"></div>
            </div>
            <div class="component">
                <div class="col-3">
                    <label for="email">Email</label>
                </div>
                <div class="col-7">
                    <input type="text" name="email">
                </div>
                <div class="clear"></div>
            </div>
            <div class="component">
                <div class="col-3">
                    <label for="password">Password</label>
                </div>
                <div class="col-7">
                    <input type="password" name="password">
                </div>
                <div class="clear"></div>
            </div>
            <div class="component">
                <div class="col-3">
                    <label for="password"> Re Password</label>
                </div>
                <div class="col-7">
                    <input type="password" name="repassword">
                </div>
                <div class="clear"></div>
            </div>
            <?php if (isset($_SESSION["emptyerr"])) {
                echo "<span>" . $_SESSION["emptyerr"] . "</span>";
            }
            ?>
            <button name="register">Register</button>
        </form>
    </div>
</body>

</html>