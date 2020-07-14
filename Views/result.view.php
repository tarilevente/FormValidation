<?php
$before=" - ";
$after=" - ";

if(Result::getBefore()){
    $before=Result::getBefore();
    $after= Result::getAfter();
    $error= Result::getError()?Result::getError():false;
}
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="printerror"></div>
        <h3>Az átváltás eredménye:</h3> 
        <div class="flex">
            <div>
                <h4 class="center"><strong> <?php echo $before; ?></strong>&nbsp&nbsp<small><i>HUF</i></small></h4>
            </div> 
            <div>
                <h4 class="center"><strong> <?php echo $after; ?></strong>&nbsp&nbsp<small><i>EUR</i></small></h4>
            </div>
        </div>
        <?php if($error)echo '<div class="error">'.$error.'</div>'; ?>
        <div class="bck">
         <a href="form">Vissza</a> 
        </div>
    </body>
</html>
