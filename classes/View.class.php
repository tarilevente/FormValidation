<?php

class View {
    static function show($page){
        require('Views/'.$page.'.view.php');
    }
}