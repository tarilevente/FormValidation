<?php

$content=array();
$content['html']='
<!DOCTYPE html>
<html lang="hu">
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="printerror"></div>
        <h3>Fizetés bankkártyával</h3> ';
$content['html'].= '
        <div class="container">
            <form method="POST" id="ccForm">
                <div>
                    <div><label for="cardNumber">Bankkártya száma:</label></div>
                    <input type="number" placeholder="XXXX XXXX XXXX XXXX" id="cardNumber" name="cardNumber"><br>
                </div>
                <div>
                    <div><label for="month">Lejárati idő (Expiration date)</label></div>
                    <input type="number" placeholder="Month (MM)" id="month" name="cardExpMonth" min="1" max="12">&nbsp&nbsp&nbsp
                    <input type="number" placeholder="Year (YY)" name="cardExpYear" min="0" max="30">
                </div>
                <div>
                    <div><label for="amount">Összeg</label></div>
                    <input type="number" placeholder="Összeg (1 - 1 000 000)" id="amount" name="amount" min="1" max="1000000" value="1000"><br>
                </div>
                <div>
                    <div><label for="submit">Küldés</label></div>
                    <input type="submit" id="submit" name="submit"> 
                </div>
            </form>
        </div>';

$content['html'].="
    </body>
</html>";

echo $content['html'];