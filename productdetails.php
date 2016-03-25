
<?php
require 'config/conn.php';
require 'include/header.php';

$prodID = $_GET["Id"];

$SQL = $conn->prepare("Select * from Product where Id = ?");
$SQL->bindValue(1,$prodID);
$SQL->execute();

$info = $SQL->fetch();


?>

<div class="col-md-offset-2 col-md-8">
    <div class="thumbnail">
        <img src="http://placehold.it/820x320" alt=""/>
        <div class="caption-full">
            <h4 class="pull-right">$<?=$info["Price"]?></h4>
            <h4><a href="http://demos.maxoffsky.com/shop-reviews/products/1"><?=$info["Name"]?></a></h4>
            <p><?=$info["Description"]?></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit

            </p>
        </div>
        <div class="ratings">
            <p class="pull-right">976 reviews</p>
            <p><span class="order">
                <a style="display: inline-block" href="#" class="order">Order</a></span>
            </p>
        </div>
    </div>

</div>

<?php
require 'include/footer.php';
?>