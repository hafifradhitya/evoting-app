<?php

if (!function_exists('css_url')){
    function css_url($file){
        return base_url('assets/css/'.$file.'.css');
    }
}

if (!function_exists('image_url')){
    function image_url($file){
        return base_url('uploads/'.$file);
    }
}

if (!function_exists('img_url')){
    function img_url($file){
        return base_url('assets/img/'.$file);
    }
}

if (!function_exists('js_url')) {
    function js_url($file){
        return base_url('assets/js/'.$file.'.js');
    }
}