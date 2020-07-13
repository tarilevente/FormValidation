<?php
class Transaction {
    private $cn;
    private $edMM;
    private $edYY;
    private $a;

    private $cnError;
    private $edMMError;
    private $edYYError;
    private $aError;

    public function __construct($cardN, $edMonth, $edYear, $am){
       $this->cn = $cardN;
       $this->edMM = $edMonth;
       $this->edYY = $edYear;
       $this->a = $am;
    }
    
    private function LuhnValid($number) {
        settype($number, 'string');
        $sumTable = array(
          array(0,1,2,3,4,5,6,7,8,9),
          array(0,2,4,6,8,1,3,5,7,9));
        $sum = 0;
        $flip = 0;
        for ($i = strlen($number) - 1; $i >= 0; $i--) {
          $sum += $sumTable[$flip++ & 0x1][$number[$i]];
        }
        return $sum % 10 === 0;
    }

    public function cnIsValid($cn){
        if(strlen($cn) != 16){
            throw new Exception("A bankkártya 16 számjegyből áll!");
            return false;
        }
        for($i=0; $i<strlen($cn); $i++){
            if(!is_numeric($cn[$i])){
                throw new Exception("A bankkártya szám kizárólag számokat tartalmazhat! ");
                return false;
            }
        }
        if(!$this->LuhnValid($cn)){
            throw new Exception("A megadott kártyaszám nem megfelelő!");
            return false;
        }
        return true;
    }

    public function edIsValid($edMM,$edYY){
        if($edMM<1 || $edMM>12 || $edYY<20 || $edYY>30 ){
            throw new Exception("Érvénytelen formátum! ");
            return false;
        }
        $YY= (int)$edYY;
        $MM= (int)$edMM;
        if( $MM!=12 ){ $MM++; }else{ $YY++; $MM=1; }
        if(strlen($MM)==1) $MM='0'.(string)$MM;
        if(strlen($YY)==1) $YY='0'.(string)$YY;
        $expireSTR = '20'.$YY.'-'.$MM.'-01';
        $expires = strtotime($expireSTR);
        $now     = strtotime(date('y-m-d'));
        if ($expires < $now) {
            throw new Exception("A kártya lejárt! ");
            return false;
        }
        return true;
    }

    public function aIsValid($a){
        for($i=0; $i<strlen($a); $i++){
            if(!is_numeric($a[$i])){
                throw new Exception("Événytelen formátum! ");
                return false;
            }
        }
        if($a<1 || $a>1000000){
            throw new Exception("Érvénytelen összeg! ");
            return false;
        }
    }

    // public function tostring(){
    //     echo 'cn: '.$this->cn.'<br>';
    //     echo 'edmm: '.$this->edMM.'<br>';
    //     echo 'edyy: '.$this->edYY.'<br>';
    //     echo 'a: '.$this->a.'<br>';
    //     return;
    // }
}

