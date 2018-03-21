<?php

function getCurrentPriceByID($id) {
    
    $price = R::findOne('pricetable', 'imgtable_id = ? order by date desc', array($id));
    if (!$price) {
        return 'Товар с ключом: ' . $id . ' отсутствует в таблице товаров.';;
    } else {
        return $price->price;
    }
    
}

function setPriceByID($id, $price) {
    
    $image = R::findOne('imgtable', 'id = ?', array($id));
    if ($image) {
    
        $resultFindPrice = R::findOne('pricetable', '$id = ? and $price = ?', array($id, $price));
        if (!$resultFindPrice) {
        
            date_default_timezone_set('Europe/Moscow');
        
            $pricetable = R::dispense('pricetable'); 
            $pricetable->date = date('m/d/Y h:i:s a', time());
            $pricetable->price = $price;
            
            $image->ownPricetableList[] = $pricetable;
            
            R::store($image);
            
        }
    }
    
}

