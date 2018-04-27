<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    require 'includes/gallery/gallery.php';
    require 'includes/prices/prices.php';
    require 'basket/basket/BasketEngine.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>Студи авторской посуды "Добрый кот"</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="css\style.css">
        <link rel="stylesheet" href="css\gallery.css">
        <link rel="stylesheet" href="css\modalList.css">        
        <link rel="stylesheet" type="text/css" href="fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        
    </head>
    <body>
        
        <!-- PRELOADER -->
        <div id="preloader">
            <div class="preloader-area">
            	<div class="preloader-box">
                    <div class="preloader"></div>
            	</div>
            </div>
        </div>

        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><b>С</b>т<b>у</b>д<b>и</b>я "Добрый кот"</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="menu">
                            <li id="main-page" class="active"><a href="#main">Главная</a></li>
                            <li id="about-page"><a href="#about">О студии</a></li>
                            <li id="gallery-page"><a href="#gallery">Галлерея</a></li>
                            <li id="autors-page"><a href="#autors">Авторы</a></li>
<!--                            <li><a href="#">Магазин</a></li>
                            <li><a href="#">Продажи</a></li>-->
                            <li id="contacts-page"><a href="#contacts">Контакты</a></li>
                            <?php setItemAuthorization(); ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right cart-menu">
                            <li><a href="debug.php"><span> Отладка</span></a></li>
                            
                            
                            
                        <!--не удалять поиск просто пока не нужен<li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>-->
                        <!--<li><a><span> Вам понравилось -$0&nbsp;</span> <span class="shoping-cart">0</span></a></li>-->    
<!--                        <li><a href="basket/basket.html"><span> Корзина -$0&nbsp;</span> <span class="shoping-cart">0</span></a></li>-->
                        
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>

<!--        не удалять поиск просто пока не нужен<section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated">
                            <div class="form-group">
                                <input type="email" class="form-control subscribe" id="email" placeholder="Поиск...">
                                <button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div> 
        </section> -->

        <section class="slider-section" id="main">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators slider-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="images/god_cat/slider/IMG_0002.JPG" width="800" height="600" alt="">
                        <div class="carousel-caption">
                            <h2>КРУЖКИ СЕРВИЗЫ <b>И</b> МНОГОЕ</h2>
                            <h2>ДРУГОЕ НА <b>Л</b>Ю<b>Б</b>О<b>Й</b> ВКУС <Span></Span></h2>
                            <a class="createOrder" href="#gallery">ОФОРМИТЬ ЗАКАЗ</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/god_cat/slider/IMG_0003.JPG" width="800" height="600" alt="">
                        <div class="carousel-caption">
                            <h2>КРУЖКИ СЕРВИЗЫ <b>И</b> МНОГОЕ</h2>
                            <h2>ДРУГОЕ НА <b>Л</b>Ю<b>Б</b>О<b>Й</b> ВКУС <Span></Span></h2>
                            <a class="createOrder" href="#gallery">ОФОРМИТЬ ЗАКАЗ</a>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="images/god_cat/slider/IMG_0004.JPG" width="800" height="600" alt="">
                        <div class="carousel-caption">
                            <h2>КРУЖКИ СЕРВИЗЫ <b>И</b> МНОГОЕ</h2>
                            <h2>ДРУГОЕ НА <b>Л</b>Ю<b>Б</b>О<b>Й</b> ВКУС <Span></Span></h2>
                            <a class="createOrder" href="#gallery">ОФОРМИТЬ ЗАКАЗ</a>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="pe-7s-angle-left glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="pe-7s-angle-right glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </section>

        <section class="service-section" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-6 wow fadeInRight animated" data-wow-delay="0.1s">
                        <div class="service-item">
                            <h3>О СТУДИИ:</h3>
                        </div>
                    </div>  
                    
                    
                    <div class="col-md-4 col-sm-6 wow fadeInRight animated" data-wow-delay="0.1s">
                        <div class="service-item">
                            <p>Наша студия занимается изготовлением авторской посуды. В том числе и под заказ (с предварительным согласованием). По вопросам заказов доставка (возможна только по выходным - Суботта / Воскресенье по территории Москвы), обращаться по телефонам, указанным в графе "Контакты"</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInRight animated" data-wow-delay="0.2s">
                        <div class="service-item">
                            <p>Из возможных направлений, на данный момент представлены сюжеты с героями знаменитой и многими любимой серии книг про Муми-троллей финской писательницы Туве Янсон. В дальнейшем планируется расширение тематик. В разработке руническая и иероглифическая символики.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInRight animated" data-wow-delay="0.3s">
                        <div class="service-item">
                            <p>Рисунки выполнены акриловыми красками, маркерами и контурами по фарфору. Экологичность и, следовательно, основная функциональная принадлежность посему сохранена - из кружек можно пить, а из тарелок есть. Подобный сервиз или отдельный предмет (кружка, супница и т.д.) является замечательным подарком близкому (в том числе и себе) на любой праздник.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-section" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>МАГАЗИН</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-menu">
                            <ul class="button-group sort-button-group cl1">
                                <li class="button active" data-category="all">Все<span><?php echo showAllQuantity() ?></span></li>
                                <?php 
                                    printCaptionsCategory(); 
                                    showAdminPossibilities();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row featured isotope">
                    
                    <!--
                        1. Скрыть / отрисовать кнопку администраирования изображений. В зависимости от пользователя. Got it
                        2. Отрисовать заголовки категорий картинок (напомню: надо придумать им адекватные имена). Got it
                        3. Проверить работу изотопа когда категорий чуть больше чем четыре. Got it
                        4. Добавить локацию (колонку в таблицу categorytable cat-1 ... cat-n) для правильной работы изотопа. Got it
                        5. Доработать правильный расчет колчества товаров. Got it
                        6. Разработать (спереть откуда нибудь) функционал корзины.
                            1. Отдельная таблица для корзины в разрезе пользователей, товаров. Got it
                            2. Возможность добавлять в корзину / удалить из корзины.
                            3. Возможность оформить заказ. Отдельная таблица для заказов 
                        7. Возможность отмечать понравившиеся товары (под это также отдельная таблица). Got it.
                        8. Возможность оповещения смс или на электронную почту о совершении заказа.
                        9. Решить путаницу с полями name и name_for_isotope при формировании категорий галлереи. Got it
                        10. Подставлять актуальные артикулы в галлерею. Got it
                        11. Подставить актуальные цены в галлерею. Got it
                        12. Оформить корзину в стиле всего сайта. Got it
                        14. Отрисовать вместо "Войти" слово "Выйти" при успешной авторизации. Got it
                        15. Посчитать и вывести количество всех товаров. Got it
                        16. При нажатии на заказ сделать якорную ссылку на галлерею. Got it
                        17. Сделать якорные ссылки для меню навигации. Got it
                        19. Нормально оформить кнопку входа / выхода. Got it
                        20. Довесить к картинкам id при выводе их на страницу. Got it.
                        21. Попробывать вывести количество лайков на каждую картинку. Got it.
                        22. Всплывающее окно при клике на значок избранного. Got it.
                        23. Оснасить корзину большой красивой кнопкой Оформить заказ. Got it.
                        24. Отработать открытие карточки товара. Got it.
                        25. Отработать hover других кнопок. Got it.
                        26. Обработать нормальное удаление. Got it.
                        27. Отработать баг с лайками у неавторизованных пользователей.
                    -->
                    
                    <?php printAllCategory(); ?>
                    
                </div>

            </div>
        </section>

        <section class="review-section" id="autors">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>АВТОРЫ</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="feedback" class="carousel slide feedback" data-ride="feedback">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="images/Autors/Julia.jpg" width="320" height="439" alt="">
                                <div class="carousel-caption">
                                    <p>Всем привет! Меня зовут Юля, и я занимаюсь росписью керамической и стеклянной посуды. Перейдя к тематическим фотогаллереям, вы можете подробно ознакомится с ассортиментом.</p>
                                    <h3>- Юлия -</h3>
                                    <!--<span>Melbour, Aus</span>-->
                                </div>
                            </div>
                            <div class="item">
                                <img src="images/Autors/Alex.jpg" width="320" height="439" alt="">
                                <div class="carousel-caption">
                                    <p>А я Александр - профессиональный программист и, по совместительству, муж. Сайт разработан мной для любимой жены.</p>
                                    <h3>- Александр -</h3>
                                    <!--<span>Melbour, Aus</span>-->
                                </div>
                            </div>
                        </div>
                        <!-- Indicators -->
                        <ol class="carousel-indicators review-controlar">
                            <li style="border: 1px solid blue" data-target="#feedback" data-slide-to="0" class="active">
                                <img src="images/Autors/Julia.jpg" width="320" height="439" alt="">
                            </li>
                            <li style="border: 1px solid blue" data-target="#feedback" data-slide-to="1">
                                <img src="images/Autors/Alex.jpg" width="320" height="439" alt="">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section" id="contacts">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>GET IN TOUCH</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft animated">
                        <div class="left-content">
                            <h1><span>M</span>art</h1>
                            <h3>We'd love To Meet You In Person Or Via The Web!</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel nulla sapien. Class aptent tacitiaptent taciti sociosqu ad lit himenaeos. Suspendisse massa urna, luctus ut vestibulum necs et, vulputate quis urna. Donec at commodo erat.</p>
                            <div class="contact-info">
                                <p><b>Main Office:</b> 123 Elm St. New York City, NY</p>
                                <p><b>Phone:</b> 1.555.555.5555</p>
                                <p><b>Email:</b> info@yourdomain.com</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form action="" method="" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Website URL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Your Message..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="Send" />
                                    </div>
                        min-heightmin-height        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="center">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
                        
                    </div>
                </div>
            </div>
        </footer>

        <div id="myModal" class="reveal-modal">
            <h1>Ваши предпочтения</h1>
            <?php setPreference() ?>
            <a class="close-reveal-modal">&#215;</a>
        </div>
        
         JQUERY 
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom.js"></script> 
        <script src="js/modalList.js"></script>
        
        <script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.4.js"></script>
        <!--<script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>-->       
        
        <script>
            $(document).ready(function () {
                
                $('#loginformExit').bind("click", function(event) {
                    
                    event.preventDefault();
                    
                    $.get("WorkWithAjax.php", { 'cleanSession': true }, function() {
                        location.reload();
                    });
                    
                });
                
                $("#menu").on("click", "a", function (event) {
                    
                    softSlide(event, this);
                    
                    $("#menu").children().each(function(i, elem) {
                        $(this).removeClass("active");
                    });
                    
                    var $currentId = $(this).parent().attr('id');
                    $('#' + $currentId).addClass("active");

                });

                $(".carousel-inner").on("click", ".createOrder", function (event) {
                    softSlide(event, this);                  
                });
                
                function softSlide(event, targetObject) {
                    
                    if ((targetObject.id !== 'loginform') && (targetObject.id !== 'cart') && (targetObject.id !== 'like')) {
                        
                        event.preventDefault();
                    
                        var id  = $(targetObject).attr('href');
                        //узнаем высоту от начала страницы до блока на который ссылается якорь
                        var top = $(id).offset().top;
                        //анимируем переход на расстояние - top за 800 мс
                        $('body, html').animate({scrollTop: top}, 800);
                        
                    }
                    
                };

                $('.ref-pe-7s-like, .ref-pe-7s-shuffle, .ref-pe-7s-cart').hover(
                    function() {
                        
                        var $that      = $(this);
                        var $className = $that.attr('class');
                        var $id        = getIdImg($that); 
                        
                        if ($className === 'ref-pe-7s-like') {
                            $.get("WorkWithAjax.php", { 'idForHaveLike': $id }, function(data) {
                                if (!data) {
                                    $that.css({"background": "#1abc9c", "border": "1px solid #1abc9c"});
                                }
                            });
                        } else if ($className === 'ref-pe-7s-cart') {
                            $.get("WorkWithAjax.php", { 'idExistInBasket': $id }, function(data) {
                                if (!data) {
                                    $that.css({"background": "#1abc9c", "border": "1px solid #1abc9c"});
                                } 
                            });
                        } else {
                            $(this).css({"background": "#1abc9c", "border": "1px solid #1abc9c"});
                        }
                        
                    },
                    function() { 
                        
                        var $that      = $(this);
                        var $className = $that.attr('class');
                        var $id        = getIdImg($that);
                        
                        if ($className === 'ref-pe-7s-like') {
                            $.get("WorkWithAjax.php", { 'idForHaveLike': $id }, function(data) {
                                if (!data) {
                                    $that.css({"background": "rgba(0, 0, 0, 0.5)", "border": "1px solid #fff"});
                                }
                            });
                        } else if ($className === 'ref-pe-7s-cart') {
                            $.get("WorkWithAjax.php", { 'idExistInBasket': $id }, function(data) {
                                if (!data) {
                                    $that.css({"background": "rgba(0, 0, 0, 0.5)", "border": "1px solid #fff"});
                                } 
                            });
                        } else {
                            $(this).css({"background": "rgba(0, 0, 0, 0.5)", "border": "1px solid #fff"});
                        }
                        
                    }
                );
        
                $('.ref-pe-7s-like').each(function(i, elem) {                   
                    setStyleLike($(this), {"background": "#1abc9c", "border": "1px solid #1abc9c"}, getIdImg($(this)));                   
                });
                                                
                $(".product-item").on("click", ".ref-pe-7s-like", function (event) {
                    
                    event.preventDefault();
                    
                    var $that          = $(this);
                    var $id            = getIdImg($that);
                    var $solveLikes    = $that.find($(".quantityLikes"));
                    var $quantityLikes = +$solveLikes.text();
                    
                    if ($id !== 0) {
                        $.get("WorkWithAjax.php", { 'idForLike': $id }, function(data) {                            
                            $("#like").replaceWith('<a id="like" href="#"><span class="glyphicon glyphicon-star"></span>' + data + '</a>');
                            
                            $.get("WorkWithAjax.php", { 'idForHaveLike': $id }, function(data) {
                                if (data) {
                                    $that.css({"background": "#1abc9c", "border": "1px solid #1abc9c"});
                                    $solveLikes.replaceWith("<span class='quantityLikes' style='position: absolute; margin: auto; left: 0; right: 0; top: 26px; bottom: 0; font-size: 40%;'>" + ($quantityLikes + 1) + "</span>");
                                } else {
                                    $that.css({"background": "rgba(0, 0, 0, 0.5)", "border": "1px solid #fff"});                             
                                    $solveLikes.replaceWith("<span class='quantityLikes' style='position: absolute; margin: auto; left: 0; right: 0; top: 26px; bottom: 0; font-size: 40%;'>" + ($quantityLikes - 1) + "</span>");
                                }
                            });
                        });
                    }
                    
                });

                $(".product-item").on("click", ".ref-pe-7s-cart", function (event) {
                
                    event.preventDefault();
                    
                    var $that = $(this);
                    var $id   = getIdImg($that);
                    
                    if ($id !== 0) {
                        
                        $.get("WorkWithAjax.php", { 'idForBasket': $id }, function(data) { 
                            $("#cart").replaceWith('<a id="cart" href="#"><span class="glyphicon glyphicon-pushpin"></span>' + data + '</a>');
                            
                            $.get("WorkWithAjax.php", { 'idExistInBasket': $id }, function(data) {
                                if (data) {
                                    $that.css({"background": "#1abc9c", "border": "1px solid #1abc9c"});
                                } else {
                                    $that.css({"background": "rgba(0, 0, 0, 0.5)", "border": "1px solid #fff"});                             
                                }
                            });
                            
                        });
                    }                                   
                    
                });
                
                             
                $(".gallery").fancybox({
                    margin: 150,
                    zoomSpeedIn: 3000,
                    zoomSpeedOut: 3000,
                    frameWidth: 750,
                    frameHeight: 750,
                    centerOnScroll: true
                });                
                              
                function setStyleLike($context, $style, $idForHaveLike) {
                        
                    $.get("WorkWithAjax.php", { 'idForHaveLike': $idForHaveLike }, function(data) {
                        if (data) {
                            $context.css($style);
                        }
                    });
                    
                }
                
                function getIdImg($context) {
                    var $id = 0;
                    $context.parents('.product-item').each(function(index, elem) {
                        $id = elem.id;
                    });
                    return $id;
                }
                
            });
                
        </script>
        
    </body>
</html>
