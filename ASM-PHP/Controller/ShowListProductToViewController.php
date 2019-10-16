<?php
require("./ASM-PHP/HelperConnection/Connection.php");
if ($conn->connect_error) {
    die("Connected Error: " . $conn->error);
}
$sql = "select * from dongnvnde18077_products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

        <div class="product">
            <a href="#">
                <div class="product__image">
                    <img src="<?php echo " http://dongnvnde18077.atwebpages.com/ASM-PHP/Controller/" . $row["pimage"] ?>" alt="">
                </div>
                <!-- <div class="product__option">
                    <ul>
                        <li class="active">
                            <img src="img/dt1small.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/dt1small1.jpg" alt="">
                        </li>
                    </ul>
                </div> -->
                <div class="product__title">
                    <i class="icon icon-tikinow"></i>
                    <p><?php echo $row["pname"]; ?></p>
                </div>
                <span class="product__sale">
                    <span class="product__sale-final">
                        <span class="product__sale-percent">
                            <?php $moneysale = ($row["price"] - (($row["price"] / 100) * $row["sale"]));
                                    echo $moneysale; ?>
                            <?php echo "-" . $row["sale"] . "%"; ?>
                        </span>
                    </span>
                    <span class="product__sale-regular"><?php echo $row["price"]; ?>₫</span>
                </span>
                <!-- <div class="product__installment">
                    Hàng quốc tế
                </div> -->
                <p class="ship-label">Hàng quốc tế</p>
                <div class="product__review">
                    <div class="product__review-start">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span class="product__review-start-y">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="product__review-text">(252 nhận xét)</div>
                </div>
            </a>
        </div>

<?php
    }
}
?>