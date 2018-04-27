<?php

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


