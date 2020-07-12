<?php
session_start();
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}

if( isset($_GET['url']) ) { $url = $_GET['url']; } else { $url=null; }

function __autoload($class){
    if(file_exists('classes/'.$class.'.class.php')) require('classes/'.$class.'.class.php'); 
}

if(file_exists('Controllers/'.$url.'.controller.php')){
    require 'Controllers/'.$url.'.controller.php';
    $controller=new $url;
} else if ($url==null){
    require 'Controllers/index.controller.php';
    $controller=new Index;
}else{
    require 'Controllers/index.controller.php';
    $controller=new Index;
}


    
