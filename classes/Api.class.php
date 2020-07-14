<?php

if(file_exists('./apikey.php')) require('./apikey.php');

class Api {
    private $apikey="";
    private $fileExists=false;
    private $errorMsg=null;
    public $result=null;

    public function getKey(){
        if(file_exists('./apikey.php')){
            //if apikey.php is in the Document Root
            $this->apikey=getApikey();
            $this->fileExists=true;
        }else{
            $this->apikey="5d2cf53d2ed461542f0b"; //This is a trial apikey of 3rd party service
            $this->fileExists=false;
        }
    }

    public function convertCurrency($amount){
    $apikey = $this->apikey;

    $from_Currency = urlencode("HUF");
    $to_Currency = urlencode("EUR");
    $query =  "{$from_Currency}_{$to_Currency}";

    if($this->fileExists){
        //in case of download from github, apikey.php is not accessible. I emailed the apikey to you
        //USING NOT PUBLIC APIKEY: 50 pieces of transfer supported for now
        try{
            //IN CASE OF https://www.currencyconverterapi.com/ SERVER FAILS,
            //----OR failed loading cafile stream
            //----OR run out of bought currency transfers
            //---------------->  just REPLACE $json code below
            $json = @file_get_contents("https://prepaid.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
            // $json='{"HUF_EUR":0.002813}';
            if(!$json){throw new Exception('Valami hiba történt! (lsd: README.md)');}
        }catch(Exception $e){ $this->errorMsg= $e->getMessage(); }
    }else{
        //USING PUBLIC APIKEY -- unfortunatly the free usage is recently not accessible from https://www.currencyconverterapi.com/,
        //so we got an error message by my program: 'Valami hiba történt!'
        //---------------->  just REPLACE $json code below for test the program is working
        //---------------->  OR USE the paid apikey above
        try{
            $json = @file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
            // $json='{"HUF_EUR":0.002813}'; //comment out for test in case of domain fails
            if(!$json){throw new Exception('Valami hiba történt! (lsd: README.md)');}
        }catch(Exception $e){ $this->errorMsg= $e->getMessage(); }
    }
    $obj = json_decode($json, true);
    $val = floatval($obj["$query"]);
    $total = $val * $amount;

    return $this->errorMsg ? -1 : number_format($total, 2, '.', '');
    }

    public function getErrorMsg(){
        return $this->errorMsg;
    }
  }