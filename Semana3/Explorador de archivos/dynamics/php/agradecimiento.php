<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador de archivos</title>
    <link rel="stylesheet" href="../../statics/style/style.css">
</head>
<body> 
    <h1>Graciassssss</h1>
    <div class="contenedor">
        <form action="../../index.html">
            <button type="submit" id="home">Regresar</button>
        </form>
    </div>  
   <?php
        //---destrucción algunas de las cookies---
        setcookie("usuario",NULL,time()-1);
        setcookie("casa",NULL,time()-1);
        setcookie("capa",NULL,time()-1);
   ?>
</body>
</html>