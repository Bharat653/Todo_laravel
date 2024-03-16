<?php

use App\Models\Sub;
use App\Models\Category;

function category() {
    $categorydata = Category::get();
    if($categorydata->count()>0){
        return $categorydata;
    }
    return [];
}

function sub() {
    $subdata = Sub::get();
    if($subdata->count()>0) {
        return $subdata;
    }
    return [];
}

?>