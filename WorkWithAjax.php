<?php
    require 'includes/gallery/gallery.php';
    
    $get = $_GET;
    
    if (isset($get['idForDelete'])) { 
        
        $idImage    = $get['idForDelete'];
        
        foreach ($idImage as $currentImageId) {
            deleteImageByID($currentImageId);
        }

    }

