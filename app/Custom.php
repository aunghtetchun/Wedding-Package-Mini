<?php


namespace App;


class Custom
{
    public static $info =  [

        "name" => "Wedding Package",
        "short_name" => "Wedding",
        "type" => "Wedding",
        "phone" => "",
        "address" =>"",
        "meta-img" => "f/img/meta.jpg",
        "mms-logo" => "dashboard/images/mms-logo.jpg",
        "c-logo" => "dashboard/images/logo.jpg",
        "main_css" => "dashboard/css/bootstrap.min.css",
    ];
    public static function toShort($text,$max=10){
        if(strlen($text) >= $max){
            return substr($text,0,$max)."...";
        }else{
            return $text;
        }
    }

}
