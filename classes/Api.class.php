<?php
    require('./apikey.php');
class Api {
    private $apikey="";
    private $fileExists=false;
    private $errorMsg=null;
    public $result=null;

    public function __construct(){
    }

    public function getKey(){
        if(file_exists('./apikey.php')){
            $this->apikey=getApikey();//the apikey is should not to push github, I'll send  via email. I bought 60
            $this->fileExists=true;
        }else{
            $this->apikey="5d2cf53d2ed461542f0b"; //the free apikey, what emailed me - the free accounts is not supported by the 3.rd party
            $this->fileExists=false;
        }
    }

    public function convertCurrency($amount){
    $apikey = $this->apikey;

    $from_Currency = urlencode("HUF");
    $to_Currency = urlencode("EUR");
    $query =  "{$from_Currency}_{$to_Currency}";

    if($this->fileExists){
        try{
            $json = file_get_contents("https://prepaid.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
            if(!$json){throw new Exception('Valami hiba történt!');}
            // var_dump("https://prepaid.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
            // $json='{"HUF_EUR":0.002813,"EUR_HUF":355.554777}';
        }catch(Exception $e){ $this->errorMsg= $e->getMessage(); }
    }else{
        $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
    }
    $obj = json_decode($json, true);
    $val = floatval($obj["$query"]);
    $total = $val * $amount;

    return $this->errorMsg ? -1 : number_format($total, 2, '.', '');
    }

    public function getErrorMsg(){
        return $this->errorMsg;
    }
    // function convertCurrency2($amount,$from_currency,$to_currency){
    //     $apikey = $this->apikey;
      
    //     $from_Currency = urlencode($from_currency);
    //     $to_Currency = urlencode($to_currency);
    //     $query =  "{$from_Currency}_{$to_Currency}";
      
    //     // change to the free URL if you're using the free version
    //     $json = file_get_contents("https://api.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
    //     $obj = json_decode($json, true);
      
    //     $val = floatval($obj["$query"]);
      
      
    //     $total = $val * $amount;
    //     return number_format($total, 2, '.', '');
    //   }
      
      //uncomment to test
      //echo convertCurrency(10, 'USD', 'PHP');
//uncomment to test
//echo convertCurrency(10, 'USD', 'PHP');

}