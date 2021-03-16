<?php 

function slugify($text){
    $text = preg_replace('~[^\pL\d]+~u','-',$text);
    // translate
    $text = iconv('utf-8','us-ascii//TRANSLIT',$text);
    //trim
    $text = trim($text,'-');
    //remove duplicate 
    $text = preg_replace('~-+~','-',$text);
    // lowercase 
    $text = strtolower($text);
    if(empty($text)){
        return 'n-a';
    }
    return $text;
}

?>