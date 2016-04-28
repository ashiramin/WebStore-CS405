<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 6:21 PM
 */
?>

<?php
require 'config/conn.php';
require 'include/header.php';


?>

<div class="well bs-component col-lg-4 col-lg-offset-4">
    <form class="form-horizontal" action="process/processRegister.php" method="post">
        <legend>Sign Up</legend>
        <fieldset>
            <div class="form-group col-md-10">
                <input type="text" placeholder="Username" name="username" id="username" class="form-control">
            </div>
            <div class="form-group col-md-10">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group col-md-10">
                <input type="password" name="confirmpassword" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <div class="col-lg-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>

<?php
require 'include/footer.php';
?>
