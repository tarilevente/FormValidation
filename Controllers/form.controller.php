<?php

class Form {
    private $view;
    private static $transaction;

    public static $cnError;
    public static $edError;
    public static $aError;

    function __construct(){
        $this->view=new View();
        View::show('form');
    }

    private function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function validate($data){
        $cn=self::testInput($_POST['cardNumber']);
        $edMM=self::testInput($_POST['cardExpMonth']);
        $edYY=self::testInput($_POST['cardExpYear']);
        $a=self::testInput($_POST['amount']);
    
        $transaction=new Transaction($cn,$edMM,$edYY,$a);
        // $transaction->tostring();
        try{
            $transaction->cnIsValid($cn);
        }catch(Exception $e){ self::$cnError=$e->getMessage(); }
        try{
            $transaction->edIsValid($edMM,$edYY);
        }catch(Exception $f){ self::$edError=$f->getMessage(); }
        try{
            $transaction->aIsValid($a);
        }catch(Exception $g){ self::$aError=$g->getMessage(); }
    }
}


