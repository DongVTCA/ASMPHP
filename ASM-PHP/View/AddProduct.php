<?php
session_start();
if (!isset($_SESSION["email"])) {
    echo "Ban phai dang nhap de thuc hien chuc nang nay";
} else if ($_SESSION["userlevel"] != 0) {
    echo "chi co admin moi co the truy cap trang nay";
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add Product</title>
        <link rel="stylesheet" href="../Css/styleform.css">
    </head>

    <body>
        <div class="container">
            <h1>Add Product</h1>
            <form action="http://dongnvnde18077.atwebpages.com/ASM-PHP/Controller/AddProductController.php" method="post" enctype="multipart/form-data">
                <div class="component">
                    <div class="col-3">
                        <label for="ProductName">Product Name</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="PName">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="component">
                    <div class="col-3">
                        <label for="ProductImage">Product Image</label>
                    </div>
                    <div class="col-7">
                        <input type="file" name="PImage">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="component">
                    <div class="col-3">
                        <label for="ProductPrice">Product Price</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="PPrice">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="component">
                    <div class="col-3">
                        <label for="ProductPrice">Product Sale</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="sale">
                    </div>
                    <div class="clear"></div>
                </div>
                <button name="Add">ADD Product</button>
            </form>
        </div>
    </body>

    </html>
<?php }?>
