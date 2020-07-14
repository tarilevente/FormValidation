<?php

class View {
    public static function show($page){
        require('Views/'.$page.'.view.php');
    }
}