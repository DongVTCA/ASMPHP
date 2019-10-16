<?php session_start();
if (!isset($_SESSION["email"])) {
    echo "Ban Chua Dang Nhap";
}
else if ($_SESSION["userlevel"] !=0) {
    echo "chi co admin moi co the truy cap trang nay";
} else {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AdminPage</title>
        <link rel="stylesheet" href="../Css/styletable.css">
        <script src="../Controller/JavaScript.js"></script>
    </head>

    <body>
        <div class="header container">
            <h1>Admin Page</h1>
        </div>
        <hr>
        <div class="nav container">
            <button><a href="http://dongnvnde18077.atwebpages.com/ASM-PHP/Controller/LogoutController.php">LogOut</a></button>
            <button class="AddPr"><a href="http://dongnvnde18077.atwebpages.com/ASM-PHP/View/AddProduct.php">Add Product</a></button>
        </div>
        <div class="main-container">
            <div class="container">
                <table>
                    <tr>
                        <th>Acion</th>
                        <th>Action</th>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Sale</th>
                    </tr>
                    <?php require('../Controller/GetListProductController.php');?>
                </table>
            </div>
        </div>
    </body>

    </html>
<?php }?>