<?php

class Index{

    function __construct(){
        $this->view=new View();
        View::show('index');
    }
}