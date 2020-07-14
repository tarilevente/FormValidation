<?php
include('form.controller.php');

class Result{
    private $api;
    private static $beforeShown=false;
    private static $afterShown=false;
    private static $error=null;

    function __construct(){
        $this->view=new View();
        $this->api=new Api();
        $this->api->getKey();
        $this->getBef(); 
        $this->calculateAfter(); 
        View::show('result');
    }

    private function getBef(){
        if(isset($_SESSION['amount']) && !empty($_SESSION['amount'])){
            self::$beforeShown=$_SESSION['amount'];
            return self::$beforeShown;
        }
        else{
            return false;
        }
    }

    public function calculateAfter(){
        $bef=self::$beforeShown;
        // var_dump($bef);
        try{
            $var=$this->api->convertCurrency(self::$beforeShown);
            if($var>-1){ self::$afterShown = $var; }
                else { 
                    self::$afterShown=" - ";
                    self::$error=$this->api->getErrorMsg();
                }
        }catch(Exception $e){}
        // self::$afterShown = $this->api->convertCurrency2(self::$beforeShown,"HUF","EUR");
        // var_dump(self::$afterShown);
    }

    public static function getBefore(){
        return self::$beforeShown;
    }

    public static function getAfter(){
        return self::$afterShown;
    }

    public static function getError(){
        return self::$error;
    }

    public static function sess_destr(){
        unset($_SESSION['amount']);
    }

}