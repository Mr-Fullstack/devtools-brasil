<?php 
    include_once "config.php";
    $url=isset($_GET['url'])?$_GET['url']:'index';
    if(file_exists('post/'.$url.'.php')){
        include('post/'.$url.'.php');
    }else{
        include('post/404.php');
    }
?>