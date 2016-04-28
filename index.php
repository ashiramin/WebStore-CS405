
<?php
require 'config/conn.php';
require 'include/header.php';


if (isset($_GET['q'])) {
    $SQL = $conn->prepare("Select p.Id as Id, p.Price, p.Qty, p.Description, Promotion.Discount, p.Name from Product p
                      LEFT OUTER JOIN Promotion on
                      p.Id = Promotion.ProductID where p.Name like ?");
    $parameter = '%' . $_GET['q'] . '%';
    $SQL->execute(array($parameter));

}
else {
    $SQL = $conn->prepare("Select p.Id as Id, p.Price, p.Qty, p.Description, Promotion.Discount, p.Name from Product p
                      LEFT OUTER JOIN Promotion on
                      p.Id = Promotion.ProductID");
    $SQL->execute();

}

?>

<div class="form-group col-md-4">
    <input type="search" class="form-control"/>
</div>
<div style="clear: both;"></div>
<br/>
<br/>
<?php
while ($info = $SQL->fetch()) {

    ?>
    <a href="productdetails.php?Id=<?=$info["Id"]?>">
        <div class="col-sm-4 col-lg-4 col-md-4">

                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4 class="pull-right">
                                <?=$info["Discount"]==NULL ?
                                     '$' .$info["Price"] :
                                    '<strong>$' .
                                    $info["Price"]*(1 - $info["Discount"]) .
                                    '</strong>    <strike>' . $info["Price"] .'</strike>'
                                ?>
                        </h4>
                        <h4><a href="#"><?=$info["Name"]?></a>
                        </h4>
                        <p><?=$info["Description"]?></p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">15 reviews</p>
                        <p>
                            <span>Quantity: <?=$info["Qty"]?></span>
                        </p>
                    </div>
                </div>

        </div>
    </a>
    <?
}
?>



<br/>
<br/>
<?php
require 'include/footer.php';
?>