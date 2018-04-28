<!DOCTYPE html>
<html>
    <?php require 'includes/gallery/gallery.php'; require 'includes/prices/prices.php'; require './basket/basket/BasketEngine.php';?>
    <head>
        <title>Shopping Cart</title>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="images/favicon.png">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="basket/basket/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="basket/basket/css/custom.css"/>
        <link rel="stylesheet" type="text/css" href="fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        
    </head>

    <body>

        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="#">Ваша корзина</a>
                <div class="navbar-right">
                    <div class="container minicart"></div>
                </div>
            </div>
        </nav>

        <div class="container text-center">

            <div class="col-md-5 col-sm-12">
                <div class="bigcart"></div>
                <h1>Это ваша покупательская корзина</h1>
                <p>
                    В ней находятся товары выбранные вами и ожидающие вашей покупки.
                </p>
                <p>
                    Вы можете управлять содержимым своей корзины путем несложных манипуляций:
                </p>    
            </div>

            <div class="col-md-7 col-sm-12 text-left">
                <ul>
                    <li class="row list-inline columnCaptions"></li>                    
                    <?php showAllProductInBasket() ?>
                </ul>
            </div>
            
            <button class="do-order">Оформить заказ</button>
            
        </div>

        <!-- The popover content -->

        <div id="popover" style="display: none">
            <!--<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>-->
            <a id="removeProduct" href="#"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="#"><span class="glyphicon glyphicon-plus"></span></a>
            <a href="#"><span class="glyphicon glyphicon-minus"></span></a>
        </div>

        <!-- JavaScript includes -->

        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
        <script src="basket/basket/js/bootstrap.min.js"></script>
        <script src="fancybox/fancybox/jquery.fancybox-1.3.4.js"></script>
        
        <script>
            $(document).ready(function () {
                               
                var pop = $('.popbtn');
                var row = $('.row:not(:first):not(:last)');

                pop.popover({
                    trigger: 'manual',
                    html: true,
                    //container: 'body',
                    placement: 'bottom',
                    animation: false,
                    content: function() {
                    	return $('#popover').html();
                    }
                }).parent().on('click', '#removeProduct', function() {
                    alert("Свойство container закоментировано, так как с ним почему то не работает это событие");
                });

                pop.on('click', function(e) {
                    pop.popover('toggle');
                    pop.not(this).popover('hide');
                });

                $(window).on('resize', function() {
                    pop.popover('hide');
                });

                row.on('touchend', function(e) {
                    $(this).find('.popbtn').popover('toggle');
                    row.not(this).find('.popbtn').popover('hide');
                    return false;
                });
                
                $('.glyphicon-remove').on('click', function () {
                    console.log('It works');
                });
                
                $(".gallery").fancybox({
                    margin: 150,
                    zoomSpeedIn: 3000,
                    zoomSpeedOut: 3000,
                    frameWidth: 750,
                    frameHeight: 750,
                    centerOnScroll: true
                });

            });
        </script>

    </body>
</html>



