<?php

class Form{
    private $view;

    function __construct(){
        $this->view=new View();
        require('Models/validation.model.php');

        View::show('form');
    }
}