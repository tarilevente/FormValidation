<?php
class Result{

function __construct(){
    $this->view=new View();
    View::show('result');
}
}