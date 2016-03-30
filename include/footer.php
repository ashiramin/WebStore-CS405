<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 4:00 PM
 */

?>


</div>

<div id="footer" class="">
    <div class="navbar navbar-inverse">
        <h4 class="text-center text-info">© 2016 University Of Kentucky</h4>
    </div>
</div>

<!-- JavaScript includes -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="/WebStore-CS405/assets/js/bootstrap.min.js"></script>
<script src="/WebStore-CS405/assets/js/customjs.js"></script>
<script>
    (function () {

        var $ol = $('ol');

        if (document.URL.indexOf("checkout")) {

            $ol.children().removeClass("active");
            $ol.children().eq(2).addClass("active");
        }
        else if (document.URL.indexOf("order")) {

            $ol.children().removeClass("active");
            $ol.children().eq(1).addClass("active");
        }
        else {
            $ol.children().removeClass("active");
            $ol.children().eq(0).addClass("active");
        }

    })();
</script>
</body>
</html>
