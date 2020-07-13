<?php

function __autoload($class){
    if(file_exists('classes/'.$class.'.class.php')) require('classes/'.$class.'.class.php'); 
}

require('routes.php');