<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 4/1/16
 * Time: 11:08 AM
 */

?>

<?php
require '../config/conn.php';
require '../include/header.php';
require '../include/auth.php';
require '../include/authorize.php';

$os = array("Manager","Staff");

if (!in_array($_SESSION['role'],$os)) {
 header("location: ../");
 //$a  = $_SESSION['role'] != "Manager";
 //var_dump($a);
 exit();
}

$SQL = $conn->prepare("Select p.Id as ProductID, p.Price, Promotion.Discount, p.Name from Product p
                      LEFT OUTER JOIN Promotion on
                      p.Id = Promotion.ProductID");

$SQL->execute();

?>


<table class="table table-striped table-bordered">
 <thead>
 <tr>
  <th>Id</th>
  <th>Name</th>
  <th>Price</th>
  <th>Discount</th>
  <th>Effective Price</th>
  <th>Action</th>
 </tr>
 </thead>
 <tbody>
 <?php
 while ($info = $SQL->fetch()) {
  
  ?>

  <tr>
   <td><?=$info["ProductID"]?></td>
   <td><?=$info["Name"]?></td>
   <td><span class="cost"><?=$info["Price"]?></span></td>
   <td>
    <span class="discount"><?=$info["Discount"]?></span>
    <input type="number" min="0" max=".99" step=".1" value="<?=$info["Discount"]?>"  style="display: none;" class="form-control" />
    <input type="hidden" value="<?=$info["ProductID"]?>" />

   </td>
   <td>
    <span class="effectiveprice"><?=$info["Price"]*(1-$info["Discount"])?></span>
   </td>
   <td>
    <button  class="btn btn-success edit">Edit</button>
   </td>
  </tr>
  <?
 }
 ?>

 </tbody>
</table>



<?
require  '../include/footer.php';
?>

<script>


 $(document).ready(function(){


  $('.edit').click(function () {
   var $input =  $(this).parent().parent().find("input[type=number]");
   var $span =  $(this).parent().parent().find("span.discount");
   var $effectivePrice =  $(this).parent().parent().find("span.effectiveprice");
   var $cost =  $(this).parent().parent().find("span.cost");
   var $prodID =  $(this).parent().parent().find(".prodid");

   if ($input.is(":visible")) {
    $(this).text("Edit");
    $span.text($input.val());
    $span.show();
    $input.hide();
    var total = parseInt(parseInt($cost.text()) * (1-parseFloat($span.text())));
    $effectivePrice.text(total);
    $.post("updatepromotion.php",
        {id:$(this).parent().parent().find("input[type=hidden]").val(),discount :$input.val() });

   }
   else {
    $(this).text("Save");
    $input.show();
    $input.focus();
    $span.hide();

   }



   console.log($span.is(":visible"));
   console.log($input.is(":visible"));

  });





 });


</script>
