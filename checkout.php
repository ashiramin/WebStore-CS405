<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/28/16
 * Time: 11:29 AM
 */

require 'config/conn.php';
require 'include/header.php';
require  'include/auth.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        /*$conn->beginTransaction();*/
        $SQL= $conn->prepare("INSERT INTO ProductOrder (OrderDate, Total ,Username) VALUES(?,?,?) ");
        $OrderDate = date("Y-m-d H:i:s");
        $SQL->bindValue("1",$OrderDate);
        $SQL->bindValue("2",$_SESSION["total"]);
        $SQL->bindValue("3",$_SESSION["userid"]);
        $SQL->execute();
        $id = $conn->lastInsertId();
        echo $id . "<br/>";
        foreach ($_SESSION["cart"] as $key=>$value) {
            echo $value . "<br/>";
            echo $key . "<br/>";
            $SQL = $conn->prepare("INSERT INTO OrderLines (ProductId,OrderId,Qty) VALUES(?,?,?)");
            $SQL->bindValue("1",$key);
            $SQL->bindValue("2",$id);
            $SQL->bindValue("3",$value);

            $SQL->execute();
        }

    } catch (PDOException $e) {

        //$conn->rollBack();
        echo "Error: " . $e->getMessage() . "<br />\n";
    }
    unset($_SESSION['cart']);
    unset($_SESSION["total"]);
}

if (!isset($_SESSION["total"])) {
    header('location:index.php');
    exit();
}

?>


<div class="col-md-offset-3 col-md-6">
    <div class="well bs-component">
        <form class="form-horizontal" method="post">
            <fieldset>
                <legend>Payment Info</legend>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="address" id="inputPassword" placeholder="Address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Credit Card</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputPassword" placeholder="Credit Card">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Total</label>
                    <div class="col-lg-10">
                        <label>$<?=$_SESSION["total"]?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
</div>

<?php
require 'include/footer.php';
?>