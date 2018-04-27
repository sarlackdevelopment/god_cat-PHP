<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../images/favicon.png">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="basket/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="basket/css/custom.css"/>		
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
                    <!--This is a free and <b><a href="http://tutorialzine.com/2014/04/responsive-shopping-cart-layout-twitter-bootstrap-3/" title="Read the article!">responsive shopping cart layout, made by Tutorialzine</a></b>. It looks nice on both desktop and mobile browsers. Try it by resizing your window (or opening it on your smartphone and pc).-->
                    В ней находятся товары выбранные вами и ожидающие вашей покупки.
                </p>
                <p>
                    Вы можете управлять содержимым своей корзины путем несложных манипуляций:
                </p>    
            </div>

            <div class="col-md-7 col-sm-12 text-left">
                <ul>
                    <li class="row list-inline columnCaptions">
                        <span>Количество</span>
                        <span>Наименование товара</span>
                        <span>Цена</span>
                    </li>
                    <li class="row">
                        <span class="quantity">1</span>
                        <span id="itemName" class="itemName">Birthday Cake</span>
                        <span class="popbtn"><a class="arrow"></a></span>
                        <span class="price">$49.95</span>
                    </li>
                </ul>
            </div>
            
<!--            <a href="#" class="do-order"/>Оформить заказ</a>-->
            <button class="do-order"/>Оформить заказ</button>
            

        </div>

        <!-- The popover content -->

        <div id="popover" style="display: none">
            <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
        </div>

        <!-- JavaScript includes -->

        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
        <script src="basket/js/bootstrap.min.js"></script>
        <script src="basket/js/customjs.js"></script>

    </body>
</html>



