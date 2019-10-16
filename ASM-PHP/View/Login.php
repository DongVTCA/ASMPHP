<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../Css/stylelogin.css">
</head>

<body>
    <form action="http://dongnvnde18077.atwebpages.com/ASM-PHP/Controller/LoginController.php" class="box" method="post">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <?php if (isset($_SESSION["noteError"])) {
                    echo "<span>". $_SESSION["noteError"] . "</span>";
                } ?>
        <button name="login" class="bt">Login</button>
        <small>Don't have an account? <a href="http://dongnvnde18077.atwebpages.com/ASM-PHP/View/FormRegister.php">Click to register account</a></small>
    </form>
</body>

</html>
<?php session_destroy(); ?>