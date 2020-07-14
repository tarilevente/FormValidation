<?php

class Index extends Controller {
    function __construct(){
        $this->view=new View();
        View::show('index');
    }
}