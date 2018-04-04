<?php

require 'includes/db.php';

function categoryIsEmpty($nameCategory) {
    
    $category = R::findOne('categorytable', 'name = ?', array($nameCategory));
    
    if (!$category) {
        return TRUE;
    } else {
        return count($category->ownImgtableList) == 0;   
    }
    
}

function categoryIsEmptyByID($id) {
    
    $category = R::findOne('categorytable', 'id = ?', array($id));
    
    if (!$category) {
        return TRUE;
    } else {
        return count($category->ownImgtableList) == 0;   
    }
    
}

//function imageExist($path) {
//    
//    $image = R::findOne('imgtable', 'path = ?', array($path));
//    
//    if ($image) {
//        return TRUE;
//    } else {
//        return FALSE;
//    }
//    
//}

//function getImageByPath($path) {
//    
//    return R::findOne('imgtable', 'path = ?', array($path));
//    
//}

function outputAllImageFromGallery($name_for_isotope) {
    
    $allImageFromGallery = getAllImageByCategoryByNameForIsotope($name_for_isotope);
    
    foreach ($allImageFromGallery as $currentImage) {
        
        $imgInfo = ['id'       => $currentImage->id,
                    'path'     => $currentImage->path,
                    'location' => $name_for_isotope,
                    'width'    => $currentImage->width,
                    'height'   => $currentImage->height,
                    'alt'      => $currentImage->alt,
                    'article'  => $currentImage->article];
        
        printImageByInfo($imgInfo);
        
    }
    
}

function addRelationIMG_Category($imgInfo) {
    
//    if (!exitsImageWithPath($imgInfo['path'])) {
//        
//        $category = getCategory($imgInfo['location']);
//
//        $img = R::dispense('imgtable');
//        $img->path   = $imgInfo['path'];
//        $img->width  = $imgInfo['width'];
//        $img->height = $imgInfo['height'];
//        $img->alt    = $imgInfo['alt'];
//
//        $category->ownImgtableList[] = $img;
//
//        R::store($category);
//        
//    }
    
    if (!exitsImageWithPath($imgInfo['path'])) {
        
        $category = getCategory($imgInfo['location']);

        $img = R::dispense('imgtable');
        $img->path    = $imgInfo['path'];
        $img->width   = $imgInfo['width'];
        $img->height  = $imgInfo['height'];
        $img->alt     = $imgInfo['alt'];
        $img->article = getArticleForImage($category);

        $category->ownImgtableList[] = $img;

        R::store($category);
        
    }
    
}

function getCategory($nameCategory) {
    
    $category = R::findOne('categorytable', 'name = ?', array($nameCategory));
    
    if (!$category) {
        
        $category = R::dispense('categorytable');
        $category->name             = $nameCategory;
        $category->name_for_isotope = getLastnameForIsotope();
        R::store($category);
    }
    
    return $category;
    
}

function getCategoryByNameForIsotope($name_for_isotope) {
    
    $category = R::findOne('categorytable', 'name_for_isotope = ?', array($name_for_isotope));
    
    if (!$category) {
        return false;
    } else {
        return $category;
    }
    
}

function getCategoryByIdImage($idImage) {
    
    $image = R::findOne('imgtable', 'id = ?', array($idImage));
    
    if (!$image) {
        return '';
    }
    
    return $image->categorytable_id;
    
}

//function getAllImageByNameForIsotope($name_for_isotope) {
//    
//    return getCategory($name_for_isotope)->ownImgtableList;
//    
//}

function getAllImageByNameForIsotope($name_for_isotope) {
    
    return getCategoryByNameForIsotope($name_for_isotope)->ownImgtableList;
    
}

function getAllImageByCategory($nameCategory) {
    
    return getCategory($nameCategory)->ownImgtableList;
    
}

function getAllImageByCategoryByNameForIsotope($name_for_isotope) {
    
    return getCategoryByNameForIsotope($name_for_isotope)->ownImgtableList;
    
}

function getAllCategory() {
    
    return R::findAll('categorytable');
    
}

function deleteCategoryByID($id) {
    
    $category = R::findOne('categorytable', 'id = ?', array($id));
    
    if ($category) {

        $images = R::findAll('imgtable', 'categorytable_id = ?', array($id));
        
        foreach ($images as $currentImage) {
             deleteImageByID($currentImage->id);
        }
        
        R::trash($category);
        
    }
    
}

//function addImageInDB($imgInfo) {
//    
//    $img = R::dispense('imgtable');
//    $img->path   = $imgInfo['path'];
//    $img->width  = $imgInfo['width'];
//    $img->height = $imgInfo['height'];
//    $img->alt    = $imgInfo['alt'];
//    R::store($img);
//    
//}

function getArticleForImage($category) {

    $quantity    = getQuantityOfCategory($category->name_for_isotope);
    $firstSymbol = mb_substr($category->name, 0, 1, "UTF-8");
    
    return $firstSymbol . (string) ($quantity + 1);
 
}

function exitsImageWithPath($path) {
    
    $img = R::findOne('imgtable', 'path = ?', array($path));
    if ($img) {
        return TRUE;
    } else {
        return FALSE;
    }
    
}

function deleteImageByID($id) {
    
    $image = R::findOne('imgtable', 'id = ?', array($id)); 
    if ($image) {
        
        $prices = R::findAll('pricetable', 'imgtable_id = ?', array($id)); 
        foreach ($prices as $currentPrice) {
            R::trash($currentPrice);
        }
        
        R::trash($image);
        
    }
    
}

function printImageByInfo($imgInfo) {
    
    $path         = $imgInfo['path'];
    $location     = $imgInfo['location'];
    $width        = $imgInfo['width'];
    $height       = $imgInfo['height'];
    $alt          = $imgInfo['alt'];
    $article      = $imgInfo['article'];
    $currentPrice = getCurrentPriceByID($imgInfo['id']) . ' руб.';
    
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
                    <h3>$article</h3>
                    <span>$currentPrice</span>
                </a>
            </div>
        </div>
    </div>";
    
}

// ****************************************************************************
// Отрисовка главной страницы

function printCaptionsCategory() {
    
    $allCategory = getAllCategory();
    
    foreach ($allCategory as $currentCategory) {
        
        $nameCategory   = $currentCategory->name;
        $nameForIsotope = $currentCategory->name_for_isotope;
        
        $quantityOfCategory = count(getAllImageByCategoryByNameForIsotope($nameForIsotope));
        
        echo "<li class='button' data-category=$nameForIsotope>$nameCategory<span>$quantityOfCategory</span></li>";
    }
    
}

function printAllCategory() {
   
    $allCategory = getAllCategory();
    foreach ($allCategory as $currentCategory) {
        outputAllImageFromGallery($currentCategory->name_for_isotope);
    }
    
}

function getLastnameForIsotope() {
    
    $allCategory = getAllCategory();
    
    if (!$allCategory) {
        return 'cat-1';
    } else {
        $lastCategory   = R::findOne('categorytable', 'order by name_for_isotope desc');
        $nameForIsotope = $lastCategory->name_for_isotope;
        $pieces         = explode("-", $nameForIsotope);

        return 'cat-' . (string)((integer)$pieces[1] + 1);
    }
    
}

function getQuantityOfCategory($name_for_isotope) {
    
    $getAllImageByNameForIsotope = getAllImageByNameForIsotope($name_for_isotope);
    return count($getAllImageByNameForIsotope);
       
}