<?php

require 'includes/db.php';

function upLoadImageInCatalog() {
    
    if (isset($_FILES['image'])) {
        
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        //$file_type = $_FILES['image']['type'];
        //$extentions = array('jpeg', 'jpg', 'png');

        if ($file_size > 209752) {
            $errors[] = 'Файл должен весить не больше двух мегабайтов';
        }

        if (empty($errors) == TRUE) {
            move_uploaded_file($file_tmp, 'images/testupload/' . $file_name);
            echo '<div style="color: green;">' . 'Файлы успешно загружены' . '</div><hr>';
        } else {
            echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
        }
        
    }
}

function addImagePathInDB() {
    
}

function categoryIsEmpty($nameCategory) {
    
    $category = R::findOne('categorytable', 'name = ?', array($nameCategory));
    
    if (!$category) {
        return TRUE;
    } else {
        return count($category->ownImgtableList) == 0;
//        return empty($category->ownImgtableList);
//            if (count($category->ownImgtableList) == 0) {
//                return TRUE;
//            } else {
//                return FALSE;
//            }   
    }
    
}

function fullLocationOfGallery($location) {
    
    $category = getCategory($location);
    
    foreach ($category->ownImgtableList as $img) {
        
        $imgInfo = ['path' => $img->path,
                    'location' => $location,
                    'width' => $img->width,
                    'height' => $img->height,
                    'alt' => $img->alt];
        
        printImageByInfo($imgInfo);
        
    }
    
}

function addRelationIMG_Category($imgInfo) {
    
    if (!exitsImageWithPath($imgInfo['path'])) {
        
        $category = getCategory($imgInfo['location']);

        $img = R::dispense('imgtable');
        $img->path = $imgInfo['path'];
        $img->width = $imgInfo['width'];
        $img->height = $imgInfo['height'];
        $img->alt = $imgInfo['alt'];

        $category->ownImgtableList[] = $img;

        R::store($category);
        
    }
}

function getCategory($nameCategory) {
    
    $category = R::findOne('categorytable', 'name = ?', array($nameCategory));
    
    if (!$category) {
        $category = R::dispense('categorytable');
        $category->name = $nameCategory;
        R::store($category);
    }
    
    return $category;
    
}

function addImageInDB($imgInfo) {
    
    $img = R::dispense('imgtable');
    $img->path = $imgInfo['path'];
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

function printImageByInfo($imgInfo) {
    
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

