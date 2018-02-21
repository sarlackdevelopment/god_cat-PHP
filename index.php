<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    require 'includes/gallery/gallery.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>Студи авторской посуды "Добрый кот"</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="css\style.css">

<!--        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="js/form.js"></script>-->
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
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Главная</a></li>
                            <li><a href="#">О студии</a></li>
                            <li><a href="#">Магазин</a></li>
                            <li><a href="#">Продажи</a></li>
                            <li><a href="#">Контакты</a></li>
                            <li><a id="loginform" href="loginform.php">Войти</a></li>
                            <li><a href="testAddImages.php">Тест</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right cart-menu">
                        <li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li><a href="#"><span> Корзина -$0&nbsp;</span> <span class="shoping-cart">0</span></a></li>                                                
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>

        <section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated">
                            <div class="form-group">
                                <input type="email" class="form-control subscribe" id="email" placeholder="Поиск...">
                                <button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!-- end /. form -->
                    </div>
                </div><!-- end of/. row -->
            </div><!-- end of /.container -->
        </section><!-- end of /.news letter section -->

        <section class="slider-section">
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
                            <a href="#">ОФОРМИТЬ ЗАКАЗ</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/god_cat/slider/IMG_0003.JPG" width="800" height="600" alt="">
                        <div class="carousel-caption">
                            <h2>КРУЖКИ СЕРВИЗЫ <b>И</b> МНОГОЕ</h2>
                            <h2>ДРУГОЕ НА <b>Л</b>Ю<b>Б</b>О<b>Й</b> ВКУС <Span></Span></h2>
                            <a href="#">ОФОРМИТЬ ЗАКАЗ</a>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="images/god_cat/slider/IMG_0004.JPG" width="800" height="600" alt="">
                        <div class="carousel-caption">
                            <h2>КРУЖКИ СЕРВИЗЫ <b>И</b> МНОГОЕ</h2>
                            <h2>ДРУГОЕ НА <b>Л</b>Ю<b>Б</b>О<b>Й</b> ВКУС <Span></Span></h2>
                            <a href="#">ОФОРМИТЬ ЗАКАЗ</a>
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

        <section class="service-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-6 wow fadeInRight animated" data-wow-delay="0.1s">
                        <div class="service-item">
                            <h3>О СТУДИИ</h3>
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

        <section class="featured-section">
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
                            <ul class="button-group sort-button-group">
                                <li class="button active" data-category="all">Все<span>12</span></li>
                                <li class="button" data-category="cat-1">Кружки<span>5</span></li>
                                <li class="button" data-category="cat-2">Чайники<span>3</span></li>
                                <li class="button" data-category="cat-3">Наборы<span>4</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row featured isotope">
                    
                    <?php
                    
                    $location = 'cat-3';
                    
                    $imgInfo1 = ['path' => 'images/Галлерея/Все/small/IMG_0002.JPG',
                                'location' => $location,
                                'width' => '255',
                                'height' => '322',
                                'alt' => 'Изображение отсутсвует'];
                    
                    $imgInfo2 = ['path' => 'images/Галлерея/Все/small/IMG_0003.JPG',
                                'location' => $location,
                                'width' => '255',
                                'height' => '322',
                                'alt' => 'Изображение отсутсвует'];
                    
                    $imgInfo3 = ['path' => 'images/Галлерея/Все/small/IMG_0004.JPG',
                                'location' => $location,
                                'width' => '255',
                                'height' => '322',
                                'alt' => 'Изображение отсутсвует'];
                    
                    $imgInfo4 = ['path' => 'images/Галлерея/Все/small/IMG_0005.JPG',
                                'location' => $location,
                                'width' => '255',
                                'height' => '322',
                                'alt' => 'Изображение отсутсвует'];
                    
                    //echo "<pre>";
                    //print_r(getCategory($location));
                    //$category = getCategory($location);
                    //echo $category;
                    //test($imgInfo1);
                    //testShow();
                    
                    addRelationIMG_Category($imgInfo1);
                    addRelationIMG_Category($imgInfo2);
                    addRelationIMG_Category($imgInfo3);
                    addRelationIMG_Category($imgInfo4);
                                            
                    fullLocationOfGallery($location);                        

//                    for ($i = 1; $i <= 3; $i++) {
//                        
//                        $imgInfo = ['path' => 'images/Галлерея/Все/small/IMG_0002.JPG',
//                                    'location' => 'cat-3',
//                                    'width' => '255',
//                                    'height' => '322',
//                                    'alt' => 'Изображение отсутсвует'];
//                        
//                        if (!exitsImageWithPath($imgInfo['path'])) {
//                            addImageInDB($imgInfo);
//                        }
//                        printImageByPath($imgInfo);
//                    } 
                    
                    ?>
                    
                    <!--<div class="col-md-3 col-sm-6 col-xs-12 cat-2 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0002.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Чайник</h3>
                                    <span>700 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>                   
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-2 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0003.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Чайник</h3>
                                    <span>700 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-2 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0004.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Чайник</h3>
                                    <span>700 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0005.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Набор</h3>
                                    <span>750 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0006.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Набор</h3>
                                    <span>750 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0008.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Набор</h3>
                                    <span>750 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-1 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0009.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Кружка</h3>
                                    <span>400 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-1 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0011.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Кружка</h3>
                                    <span>400 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-1 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0012.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Кружка</h3>
                                    <span>400 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-1 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0016.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Кружка</h3>
                                    <span>400 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-1 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0017.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Кружка</h3>
                                    <span>400 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                        <div class="product-item">
                            <img src="images/Галлерея/Все/small/IMG_0007.JPG" class="img-responsive" width="255" height="322" alt="">
                            <div class="product-hover">
                                <div class="product-meta">
                                    <a href="#"><i class="pe-7s-like"></i></a>
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    <a href="#"><i class="pe-7s-cart"></i>В корзину</a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">
                                    <h3>Набор</h3>
                                    <span>750 руб.</span>
                                </a>
                            </div>
                        </div>
                    </div>-->
                    
                </div>

            </div>
        </section>

        <section class="review-section">
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

        <section class="contact-section">
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
                                </div>
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

        <!-- JQUERY -->
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom.js"></script>  
        
    </body>
</html>
