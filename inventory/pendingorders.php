<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 6:21 PM
 */
?>

<?php
require '../config/conn.php';
require '../include/header.php';

$SQL = $conn->prepare("Select * from ProductOrder where Status = 0");


$SQL->execute();

?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>User</th>
        <th>Total</th>
        <th>Order Date</th>
        <th>Ship Order</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($info = $SQL->fetch()) {
        ?>
        <tr>
            <td>
                <span><?=$info["Username"]?></span>
                <input type="hidden" value="<?=$info["Id"]?>" />
            </td>
            <td><?=$info["total"]?></td>
            <td>
                <span><?=$info["OrderDate"]?></span>

            </td>
            <td>
                <button  class="btn btn-success edit">Ship</button>

            </td>
        </tr>
        <?
    }
    ?>

    </tbody>
</table>

<?php
require '../include/footer.php';
?>

<script>


    $(document).ready(function(){
        $('tr td:nth-child(3)').click(function() {
            console.log("asds");
            console.log($(this));
        });

        $('.edit').click(function () {
               var $ol =  $(this).parent().parent().find("span").text();
               var $id =  $(this).parent().parent().find("input[type=hidden]").val();
                $.post("processorders.php",
                    {id:$id,username :$ol }, function(data) {
                        location.reload();
                    });
            });





    });


</script>

