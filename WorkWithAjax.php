<?php
    require 'includes/gallery/gallery.php';
    require 'includes/prices/prices.php';
    
    $get = $_GET;
    
    if (isset($get['idForDelete'])) { 
        
        $idImage = $get['idForDelete'];
        
        foreach ($idImage as $currentImageId) {
            deleteImageByID($currentImageId);
        }

    }
    
    if (isset($get['idForAddPrice']) and isset($get['currentPrice'])) { 
        setPriceByID($get['idForAddPrice'], $get['currentPrice']);
    }

