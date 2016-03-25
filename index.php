
<?php
require 'config/conn.php';
require 'include/header.php';
require  'include/auth.php';

$SQL = $conn->prepare("Select * from Product");

$SQL->execute();

//;

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
                        <h4 class="pull-right">$<?=$info["Price"]?></h4>
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