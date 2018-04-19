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
    $id           = $imgInfo['id'];
    $article      = $imgInfo['article'];
    $currentPrice = getCurrentPriceByID($imgInfo['id']) . ' руб.';
    
    echo "
    <div class='col-md-3 col-sm-6 col-xs-12 $location featured-items isotope-item'>
        <div id=$id class='product-item'>
            <img src=$path class='img-responsive' width=$width height=$height alt=$alt>
            <div class='product-hover'>
                <div class='product-meta'>
                    <a class='ref-pe-7s-like' href='#'><i class='pe-7s-like'></i></a>
                    <a class='ref-pe-7s-shuffle' href='#'><i class='pe-7s-shuffle'></i></a>
                    <a class='ref-pe-7s-cart' href='#'><i class='pe-7s-cart'></i>В корзину</a>
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

//function printImageByInfo($imgInfo) {
//    
//    $path         = $imgInfo['path'];
//    $location     = $imgInfo['location'];
//    $width        = $imgInfo['width'];
//    $height       = $imgInfo['height'];
//    $alt          = $imgInfo['alt'];
//    $id           = $imgInfo['id'];
//    $article      = $imgInfo['article'];
//    
//    $currentPrice        = getCurrentPriceByID($imgInfo['id']) . ' руб.';
//    $userIsAuthorization = array_key_exists('logged_user', $_SESSION);
//    
//    echo "
//    <div class='col-md-3 col-sm-6 col-xs-12 $location featured-items isotope-item'>
//        <div id=$id class='product-item'>
//            <img src=$path class='img-responsive' width=$width height=$height alt=$alt>
//            <div class='product-hover'>
//                <div class='product-meta'>";
//                    if ($userIsAuthorization) {
//                        echo "<a class='ref-pe-7s-like' href='#'><i class='pe-7s-like'></i></a>";
//                    }
//                    echo "<a href='#'><i class='pe-7s-shuffle'></i></a>";
//                    if ($userIsAuthorization) {
//                        echo "<a href='#'><i class='pe-7s-cart'></i>В корзину</a>";
//                    }
//    echo            "</div>
//            </div>
//            <div class='product-title'>
//                <a href='#'>
//                    <h3>$article</h3>
//                    <span>$currentPrice</span>
//                </a>
//            </div>
//        </div>
//    </div>";
//    
//}

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

function showAllQuantity() {
    
    $allQuantity = 0;
    
    $allCategory = getAllCategory();
    foreach ($allCategory as $currentCategory) {
        $allQuantity = $allQuantity + getQuantityOfCategory($currentCategory->name_for_isotope);
    }
    
    return $allQuantity;
    
}

function getQuantityOfCategory($name_for_isotope) {
    
    $getAllImageByNameForIsotope = getAllImageByNameForIsotope($name_for_isotope);
    return count($getAllImageByNameForIsotope);
       
}

function showAdminPossibilities() {
    
    if (!array_key_exists('logged_user', $_SESSION)) {
        echo "";
    } else {
        $userPassword = $_SESSION['logged_user']['password'];
        if ($userPassword == '$2y$10$Q9Y0eIy.PufRCXC83o9gF.C0BP8hGysQJ30oDzpm1IjqEjqQ9T9hy' 
                or $userPassword == '$2y$10$WKSgYKyGIwKR7fPmhEC/keRT94QlJpvG2OAgvl3qsEle72dXPIOIK') {
            echo "<li><a id='loginform' href='AdminPanel.php'>Администрировать</a></li>";
        } else {
            echo "";  
        }
    }
    
}

//// Этот метод нужно перенести в соответствующий модуль Авторизации
//function setItemAuthorization() {
//
//    if (!array_key_exists('logged_user', $_SESSION)) {
//        echo "<li><a id='loginform' href='loginform.php'>Войти</a></li>";
//    } else {
//        $allLikes = getAllLikes();
//        echo "
//        <li><a id='loginformExit' href='#'>Выйти</a></li>
//        <li><a id='cart' href='basket/basket.html'><span class='glyphicon glyphicon-pushpin'></span></a></li>
//        <li><a id='like' href='#'><span class='glyphicon glyphicon-star'></span>$allLikes</a></li>";
//    }
//}

// Этот метод нужно перенести в соответствующий модуль Авторизации
function setItemAuthorization() {

    if (!array_key_exists('logged_user', $_SESSION)) {
        echo "<li><a id='loginform' href='loginform.php'>Войти</a></li>";
    } else {
        $allLikes = getAllLikes();
        echo "
        <li><a id='loginformExit' href='#'>Выйти</a></li>
        <li><a id='cart' href='basket/basket.html'><span class='glyphicon glyphicon-pushpin'></span></a></li>
        <li><a id='like' href='#'><span class='glyphicon glyphicon-star'></span>$allLikes</a></li>";
    }
}

// Этот метод нужно перенести в соответствующий модуль работы с таблицей лайков
function setLike($idImage) {
    
    // Создаем таблицу или находим строку в уже существующей.
    $idUser      = $_SESSION['logged_user']['id'];
    $currentLike = R::findOne('liketable', 'imgtable_id = ? and usertable_id = ?', array($idImage, $idUser));
    
    if (!$currentLike) {
        $currentLike = R::dispense('liketable');
        $currentLike->likeimg = FALSE;
    }
    
    $currentLike->likeimg = !$currentLike->likeimg;
    
    // Ищем текущего пользователя по id и привязываемся к нему как к владельцу лайка.
    $currentUser = R::findOne('usertable', 'id = ?', array($idUser));
    $currentUser->ownLiketableList[] = $currentLike;
    R::store($currentUser);
    
    // Ищем текущее изображение по id и привязываемся к нему как к владельцу лайка.
    $currentImage = R::findOne('imgtable', 'id = ?', array($idImage));
    $currentImage->ownLiketableList[] = $currentLike;
    R::store($currentImage);
    
}

function getAllLikes() {
    
    $idUser = $_SESSION['logged_user']['id'];
    return R::count('liketable', 'likeimg = ? and usertable_id = ?', array(1, $idUser));
    
}

function existLikeByID($idImg) {
    
    if (!array_key_exists('logged_user', $_SESSION)) {
        return FALSE;
    }
    
    $idUser      = $_SESSION['logged_user']['id'];
    $currentLike = R::findOne('liketable', 'imgtable_id = ? and usertable_id = ?', array($idImg, $idUser));
    
    if (!$currentLike) {
        return FALSE;
    }
    else {
        if ($currentLike->likeimg == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
}