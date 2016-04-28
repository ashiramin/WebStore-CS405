
<?php
require 'config/conn.php';
require 'include/header.php';
require  'include/auth.php';

$prodID = $_GET["Id"];

$SQL = $conn->prepare("Select * from Product where Id = ?");
$SQL = $conn->prepare("Select p.Id as Id, p.Price, p.Qty, p.Name , p.Description, Promotion.Discount, p.Name from Product p
                      LEFT OUTER JOIN Promotion on
                      p.Id = ?");
$SQL->bindValue(1,$prodID);
$SQL->execute();

$info = $SQL->fetch();


?>

<div class="col-md-offset-2 col-md-8">
    <div class="thumbnail">
        <img src="http://placehold.it/820x320" alt=""/>
        <input type="hidden" id="prodID" value="<?=$info["Id"]?>">
        <div class="caption-full">
            <h4 class="pull-right">
                <?=$info["Discount"]==NULL ?
                    '$' .$info["Price"] :
                    '<strong>$' .
                    $info["Price"]*(1 - $info["Discount"]) .
                    '</strong>    <strike>' . $info["Price"] .'</strike>'
                ?>
            </h4>
            <h4><a href="http://demos.maxoffsky.com/shop-reviews/products/1"><?=$info["Name"]?></a></h4>
            <p><?=$info["Description"]?></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit

            </p>
        </div>
        <div class="ratings">
            <p class="pull-right">

            </p>
            <p>

            <div  class="form-group">
                <label for="sel1">Qty:</label>
                <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                <span class="order">
                <a style="display: inline-block"     id="order" class="order">Add to Cart</a>
                </span>
            </div>
            </p>
        </div>
    </div>

</div>

<?php
require 'include/footer.php';
?>
<script>


    $(document).ready(function(){
        $("#order").click(function() {
            $.post("process/processCart.php",{Id : $("#prodID").val() , Qty : $("#sel1").val() }, function (data) {
                console.log("asds");
                 window.history.go(-1);
            });
        });

    });


</script>
