<?php

if(isset($_POST) &&!empty($_POST)){
    $process = Form::validate($_POST);
    if($process){ header('Location:result'); }
}
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="printerror"></div>
        <h3>Fizetés bankkártyával</h3> 
        <div class="container">
            <form method="POST" id="ccForm" action="">
                <div>
                    <div><label for="cardNumber">Bankkártya száma: </label></div>
                    <input type="text" placeholder="XXXX XXXX XXXX XXXX" id="cardNumber" name="cardNumber" minlength="16" maxlength="16" pattern="[0-9]{16}" title="Kérem adjon meg 16 db számot!"  required>
                    <br>
                </div>
                <div class="input-warning"><?php if(null!==Form::$cnError)echo '<span class="bg-warning">'.Form::$cnError.'</span>'; ?></div>
                <div>
                    <div><label for="month">Lejárati idő: (Expiration date)</label></div>
                    <input type="number" placeholder="Month (MM)" id="month" name="cardExpMonth" min="1" max="12" required>&nbsp&nbsp&nbsp
                    <input type="number" placeholder="Year (YY)" name="cardExpYear" min="20" max="30" required>
                </div>
                <div class="input-warning"><?php if(null!==Form::$edError)echo '<span class="bg-warning">'. Form::$edError.'</span>'; ?></div>
                <div>
                    <div><label for="amount">Összeg: </label></div>
                    <input type="number" placeholder="Összeg" id="amount" name="amount" min="1" max="1000000" value="1000" title="1 - 1 000 000" required><br>
                </div>
                <div class="input-warning"><?php if(null!==Form::$aError)echo '<span class="bg-warning">'.Form::$aError.'</span>'; ?></div>
                <input type="submit" id="submit" name="submit"> 
                <div class="warning"><?php if(null!==Form::$aError || null!==Form::$edError || null!==Form::$cnError)echo "<span>A rögzítés nem sikerült, próbáld újra! </span>" ?></div>
            </form>
        </div>
    </body>
</html>
