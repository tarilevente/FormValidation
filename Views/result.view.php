<?php
$before=1000000;
$after=(double)1000000/380;
$content=array();
$content['html']='
<!DOCTYPE html>
<html lang="hu">
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="printerror"></div>
        <h3>Az átváltás eredménye:</h3> ';
$content['html'].= '
        <div class="flex">
            <div>
                <h4 class="center"><strong> '.$before.'</strong>&nbsp&nbsp<small><i>HUF</i></small></h4>
            </div> 
            <div>
                <h4 class="center"><strong> '.$after.'</strong>&nbsp&nbsp<small><i>EUR</i></small></h4>
            </div>
        </div>
        <div class="bck">
         <a href="form">Vissza</a> 
        </div>
        ';

$content['html'].="
    </body>
</html>";

echo $content['html'];