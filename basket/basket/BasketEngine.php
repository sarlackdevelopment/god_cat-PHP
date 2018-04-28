<?php
  
    //require '../../includes/db.php';
    //require '../../includes/db.php';
    //require '../../includes/prices.php';
    //echo dirname(__FILE__) . '\includes\db.php';
    //require 'C:\xampp\htdocs\good_cat_Shop\includes\db.php';
    //require '../../includes'

// Программный интерфес

function pushBasket($idProduct) {
    
    // Ищем артикул товара по id.
    $product = R::findone('imgtable', 'id = ?', array($idProduct));
    
    // Добавляем товар в корзину.
    $currentProduct = R::dispense('baskettable');
    $currentProduct->nameproduct = $product->article;;
    
    // Определяем id текущего пользователя.
    $idUser = $_SESSION['logged_user']['id'];
    
    // Ищем текущего пользователя по id и привязываемся к нему как к владельцу товара.
    $currentUser = R::findOne('usertable', 'id = ?', array($idUser));
    $currentUser->ownBaskettableList[] = $currentProduct;
    R::store($currentUser);
    
    // Ищем текущее изображение по id и привязываемся к нему как к владельцу товара.
    $currentImage = R::findOne('imgtable', 'id = ?', array($idProduct));
    $currentImage->ownBaskettableList[] = $currentProduct;
    R::store($currentImage);
    
}

function popBasket($idProduct) {
    
    // Ищем товар в корзине по id.
    $product = findProduct($idProduct);
    
    // Извлекаем товар из корзины.
    R::trash($product);
    
}


function findProduct($idProduct) {
    
    // Определяем id текущего пользователя.
    $idUser = $_SESSION['logged_user']['id'];
   
    // Ищем артикул товара по id изображения и по id авторизованного пользователя.
    $product = R::findone('baskettable', 'imgtable_id = ? and usertable_id = ?', array($idProduct, $idUser));
    
    return $product;
    
}

function existProductByID($idProduct) {
    
    // Определяем id текущего пользователя. Если пользователь не авторизован, считается что в корзине ничего быть не может.
    if (!array_key_exists('logged_user', $_SESSION)) {
        return FALSE;
    }
    
    // Ищем товар в корзине по id товара и id текущего авторизованного пользователя.
    $idUser  = $_SESSION['logged_user']['id'];
    $product = R::findOne('baskettable', 'imgtable_id = ? and usertable_id = ?', array($idProduct, $idUser));
    
    if (!$product) {
        return FALSE;
    }
    else {
        return TRUE;
    }
   
}

//function showAllProductInBasket() {
//   
//    // Определяем id текущего пользователя.
//    $idUser = $_SESSION['logged_user']['id'];
//   
//    // Ищем артикул товара по id изображения и по id авторизованного пользователя.
//    $product = R::findAll('baskettable', 'usertable_id = ?', array($idUser));
//    
//    foreach ($product as $currentProduct) {
//        
//        $imgtable_id = $currentProduct->imgtable_id;
//        $image       = R::findOne('imgtable', 'id = ?', array($imgtable_id));
//        
//        $article = $image->article;
//        $price   = getCurrentPriceByID($imgtable_id);
//        //$price   = 12;
//        
//        echo 
//        "<li class='row'>
//            <span class='quantity'>1</span>
//            <span id='itemName' class='itemName'>$article</span>
//            <span class='price'>$price</span>
//        </li>";
//    }
//    
//}


function showAllProductInBasket() {
   
    // Определяем id текущего пользователя.
    $idUser = $_SESSION['logged_user']['id'];
   
    // Ищем артикул товара по id изображения и по id авторизованного пользователя.
    $product = R::findAll('baskettable', 'usertable_id = ?', array($idUser));
    
    foreach ($product as $currentProduct) {
        
        $imgtable_id = $currentProduct->imgtable_id;
        $image       = R::findOne('imgtable', 'id = ?', array($imgtable_id));
        
        $article = $image->article;
        $path    = $image->path;
        $alt     = $image->alt;
        $price   = getCurrentPriceByID($imgtable_id);
        
        echo 
        "<li style='display: flex; justify-content: space-between; border: border: 1px solid #9dcc7a;' class='row'>
            <div class='removable' style='width: 80px; height: 40px; margin-bottom: 20px;'>
                <div id=$imgtable_id class='product-item'>
                    <a href=$path title='Артикул - $article, цена - $price' class='gallery' rel='group'><img src=$path class='img-responsive' width=150px height=150px alt=$alt></a>
                </div>
            </div>
            <span id='itemName' class='itemName'>$article</span>
            <span class='quantity'>1</span>            
            <span class='price'>$price руб.</span>
            <span class='popbtn'><a class='arrow'></a></span>
        </li>";
    }
    
}

// <span id='itemName' class='itemName'>$article</span>

//<div class='removable' style='width: 210px; height: 170px; margin: 3px;'>
//                <div id=$id class='product-item'>
//                    <img src=$path class='img-responsive' width=150px height=150px alt=$alt>
//                    <div class='product-hover'>
//                        <div class='product-meta'>                   
//                            <a class='ref-pe-7s-cart' href='#'><i class='pe-7s-cart'></i>В корзину</a>
//                        </div>
//                    </div>
//                    <div class='product-title'>
//                        <a href='#'>
//                            <h3>$article</h3>
//                            <span>$currentPrice</span>
//                        </a>
//                    </div>
//                </div>
//            </div>";


