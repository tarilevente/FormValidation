<?php

class Form{
    private $view;

    function __construct(){
        $this->view=new View();
        

        View::show('form');
    }
}