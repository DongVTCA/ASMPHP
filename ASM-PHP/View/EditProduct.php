<?php
session_start();
if (empty($_SESSION["email"])) {
    echo "Ban phai dang nhap moi thuc hien duoc chuc nang nay";
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
        <title>Edit Product</title>
        <link rel="stylesheet" href="../Css/styleform.css">
    </head>

    <body>
        <?php $id = $_GET["id"]; ?>
        <div class="container">
            <h1>Edit Product</h1>
            <form action="http://dongnvnde18077.atwebpages.com/ASM-PHP/Controller/EditProductController.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <div class="component">
                    <div class="col-3">
                        <label for="ProductName">Product Name</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="ProductName">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="component">
                    <div class="col-3">
                        <label for="ProductImage">Product Image</label>
                    </div>
                    <div class="col-7">
                        <input type="file" name="ProductImage">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="component">
                    <div class="col-3">
                        <label for="ProductPrice">Product Price</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="ProductPrice">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="component">
                    <div class="col-3">
                        <label for="Productsale">Product Sale</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="sale">
                    </div>
                    <div class="clear"></div>
                </div>
                <button name="Edit">Edit Product</button>
            </form>
        </div>
    </body>

    </html>
<?php }?>