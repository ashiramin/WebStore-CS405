
<?php
require 'config/conn.php';
require 'include/header.php';
?>

<div class="container text-center">

    <div class="col-md-5 col-sm-12">
        <div class="bigcart"></div>
        <h1>Your shopping cart</h1>
        <p>
            This is a free and <b><a href="http://tutorialzine.com/2014/04/responsive-shopping-cart-layout-twitter-bootstrap-3/" title="Read the article!">responsive shopping cart layout, made by Tutorialzine</a></b>. It looks nice on both desktop and mobile browsers. Try it by resizing your window (or opening it on your smartphone and pc).
        </p>
    </div>

    <div class="col-md-7 col-sm-12 text-left">
        <ul>
            <li class="row list-inline columnCaptions">
                <span>QTY</span>
                <span>ITEM</span>
                <span>Price</span>
            </li>
<?php


if (isset($_SESSION["cart"])) {
$cart = $_SESSION["cart"];
$total = 0;
foreach ($cart as $prodID => $qty) {

//$SQL = $conn->prepare("Select Price * ? as total , Name from Product where Id = ?");

$SQL = $conn->prepare("SELECT
                                (CASE
                                WHEN Promotion.Discount is null THEN Product.Price * ?
                                WHEN Promotion.Discount is not NULL Then Product.Price*(1 - Promotion.Discount) * ?
                                END) as total, Product.Name, Product.Price as RealPrice
                                 FROM Product
                                LEFT OUTER JOIN Promotion on Product.Id = Promotion.ProductID
                                where Product.Id = ?");


$SQL->bindValue("1", $qty);
$SQL->bindValue("2", $qty);
$SQL->bindValue("3", $prodID);
$SQL->execute();
$info = $SQL->fetch();
$total += round($info["total"])


?>
            <form id="orderform">
                <li class="row">
        <span class="quantity">
            <div class="form-group row ">
                <select name="<?= $prodID ?>" class="form-control" id="sel1">
                    <option <?= $qty == 0 ? 'selected' : '' ?>>0</option>
                    <option <?= $qty == 1 ? 'selected' : '' ?>>1</option>
                    <option <?= $qty == 2 ? 'selected' : '' ?>>2</option>
                    <option <?= $qty == 3 ? 'selected' : '' ?>>3</option>
                    <option <?= $qty == 4 ? 'selected' : '' ?> >4</option>
                </select>
            </div>
        </span>
                    <span class="itemName"><?= $info["Name"] ?></span>
                    <span class="popbtn"><a class="arrow"></a></span>
                    <span class="price">$<?= round($info["total"]) ?></span>
                </li>
                <?
                }
                $_SESSION["total"] = $total;
                }
                else {
                    ?>
                    <h2>Your cart is empty</h2>
                    <?
                }


?>
            <li class="row totals">
                <span class="itemName">Total:</span>
                <span class="price">$<?=isset($total) ? $total : ''?></span>
                <span class="order"> <a class="text-center" id="order">Update Cart</a></span>
                <span class="order"> <a class="text-center"  href="checkout.php" >Procees to Checkout</a></span>
            </li>
        </ul>
    </div>
    </form>
</div>

<!-- The popover content -->

<div id="popover" style="display: none">
    <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
</div>

<?php
require 'include/footer.php';
?>
<script>


    $(document).ready(function(){
        console.log($("#orderform").serialize());
        $("#order").click(function() {
            $.post("process/updateCart.php", $("#orderform").serialize(), function () {
                location.reload();
            });
        });
    });


</script>

