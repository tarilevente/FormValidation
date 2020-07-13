<?php
class Transaction {
    private $cn;
    private $edMM;
    private $edYY;
    private $a;

    public $itt='itt';
    function __contruct(){
        echo $this->itt;
    }
}

if(isset($_POST)&&!empty($_POST)){
    $trans=new Transaction();
    var_dump($trans);
}