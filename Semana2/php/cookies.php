
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    // $duracion=time()+60*10;
    // setcookie("cookie1","5",$duracion);
    // $valor=$_COOKIE["cookie1"];
    // echo $valor;
    // //$duracion=time()-1;
    // setcookie("cookie1","",time()-1);
    // //echo $_COOKIE["cookie1"];
    // //echo $valor;

    // session_start();
    // $_SESSION["usuario"]="dabalo";
    // var_dump($_SESSION);
    // //session_destroy();

    


?>
    <form action="./cookies.php" method="post" enctype="multipart/form-data">
        <fieldset>
        <legend>Galería de imágenes</legend>
        <label>Nombre
            <input type="text" name="nombre">
        </label>
        
        </fieldset>
    </form>
</body>
</html>