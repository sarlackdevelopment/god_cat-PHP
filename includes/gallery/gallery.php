<?php

require 'includes/db.php';

function addImageInDB($imgInfo) {
    
    $img = R::dispense('imgtable');
    $img->path = $imgInfo['path'];
    $img->location = $imgInfo['location'];
    $img->width = $imgInfo['width'];
    $img->height = $imgInfo['height'];
    $img->alt = $imgInfo['alt'];
    R::store($img);
    
}

function exitsImageWithPath($path) {
    $img = R::findOne('imgtable', 'path = ?', array($path));
    if ($img) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function printImageByPath($imgInfo) {
    
    $path = $imgInfo['path'];
    $location = $imgInfo['location'];
    $width = $imgInfo['width'];
    $height = $imgInfo['height'];
    $alt = $imgInfo['alt'];
    
    echo "
    <div class='col-md-3 col-sm-6 col-xs-12 $location featured-items isotope-item'>
        <div class='product-item'>
            <img src=$path class='img-responsive' width=$width height=$height alt=$alt>
                <div class='product-hover'>
                    <div class='product-meta'>
                        <a href='#'><i class='pe-7s-like'></i></a>
                        <a href='#'><i class='pe-7s-shuffle'></i></a>
                        <a href='#'><i class='pe-7s-cart'></i>В корзину</a>
                    </div>
                </div>
            <div class='product-title'>
                <a href='#'>
                    <h3>Чайник</h3>
                    <span>700 руб.</span>
                </a>
            </div>
        </div>
    </div>";
    
}

