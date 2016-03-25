
<?php
require 'config/conn.php';
require 'include/header.php';

?>

<div class="container text-center">

    <div class="col-md-5 col-sm-12">
        <div class="bigcart"></div>
        <h1>Your shopping cart</h1>
        <p>
            This is a free and <b><a href="http://tutorialzine.com/2014/04/responsive-shopping-cart-layout-twitter-bootstrap-3/" title="Read the article!">responsive shopping cart layout, made by Tutorialzine</a></b>. It looks nice on both desktop and mobile browsers. Try it by resizing your window (or opening it on your smartphone and pc).
        </p>
    </div>

    <div class="col-md-7 col-sm-12 text-left">
        <ul>
            <li class="row list-inline columnCaptions">
                <span>QTY</span>
                <span>ITEM</span>
                <span>Price</span>
            </li>
            <li class="row">
                <span class="quantity">1</span>
                <span class="itemName">Birthday Cake</span>
                <span class="popbtn"><a class="arrow"></a></span>
                <span class="price">$49.95</span>
            </li>
            <li class="row">
                <span class="quantity">50</span>
                <span class="itemName">Party Cups</span>
                <span class="popbtn"><a class="arrow"></a></span>
                <span class="price">$5.00</span>
            </li>
            <li class="row">
                <span class="quantity">20</span>
                <span class="itemName">Beer kegs</span>
                <span class="popbtn"><a class="arrow"></a></span>
                <span class="price">$919.99</span>
            </li>
            <li class="row">
                <span class="quantity">18</span>
                <span class="itemName">Pound of beef</span>
                <span class="popbtn"><a class="arrow"></a></span>
                <span class="price">$269.45</span>
            </li>
            <li class="row">
                <span class="quantity">1</span>
                <span class="itemName">Bullet-proof vest</span>
                <span class="popbtn"  data-parent="#asd" data-toggle="collapse" data-target="#demo"><a class="arrow"></a></span>
                <span class="price">$450.00</span>
            </li>
            <li class="row totals">
                <span class="itemName">Total:</span>
                <span class="price">$1694.43</span>
                <span class="order"> <a class="text-center">ORDER</a></span>
            </li>
        </ul>
    </div>

</div>

<!-- The popover content -->

<div id="popover" style="display: none">
    <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
</div>

<?php
require 'include/footer.php';
?>