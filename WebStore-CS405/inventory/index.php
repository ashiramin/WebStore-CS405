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
require '../include/auth.php';
require '../include/authorize.php';

$os = array("Manager","Staff");

if (!in_array($_SESSION['role'],$os)) {
    header("location: ../");
    exit();
}

$SQL = $conn->prepare("Select * from Product");

$SQL->execute();

?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while ($info = $SQL->fetch()) {
            ?>
            <tr>
                <td><?=$info["Name"]?></td>
                <td><?=$info["Price"]?></td>
                <td>
                    <span><?=$info["Qty"]?></span>
                    <input type="number" min="1" value="<?=$info["Qty"]?>"  style="display: none;" class="form-control" />
                    <input type="hidden" value="<?=$info["Id"]?>" />
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
            var $input =  $(this).parent().parent().find("input[type=number]");
            var $span =  $(this).parent().parent().find("span");

            if ($input.is(":visible")) {
                $(this).text("Edit");
                $span.text($input.val());
                $span.show();
                $input.hide();
                $.post("updateInventory.php",
                    {Id:$(this).parent().parent().find("input[type=hidden]").val(),Qty :$input.val() });

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

