<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../statics/style/style.css">
</head>
<body>
<?php
    //0
    if((isset($_POST['nombre']) && $_POST['nombre']!='')?true:false)
    {
        setcookie("usuario",(isset($_POST['nombre']) && $_POST['nombre']!='')?$_POST['nombre']:false,time()+60*60);
        setcookie("casa",(isset($_POST['casa']) && $_POST['casa']!='')?$_POST['casa']:false,time()+60*60);
        // setcookie("capa",1,time()+60*60);

    }
    
    $opt=(isset($_POST['opt']) && $_POST['opt']!='')?$_POST['opt']:false;
    if($opt=="salida")
    {
        echo '
            <script>
                window.location.replace("../../index.html");
            </script>
        ';
        setcookie("usuario",NULL,time()-1);
        setcookie("casa",NULL,time()-1);
    }
    //1x
    
    //2
    if(!(isset($_POST['opt']) && $_POST['opt']!='')?true:false)//cuando no hay variable, se ejecuta
    {
        $usuario=(isset($_POST['nombre']) && $_POST['nombre']!='')?$_POST['nombre']:false;
        echo '<h1>¿Qué quieres hacer, '.$usuario.'?</h1>';
        echo '
            <div class="contenedor">
                <form method="post" action="./exp_arch_act.php" target="_top">
                        <label for="action">
                            <input type="radio" name="action" value="Crear">Crear archivo<br>
                            <input type="radio" name="action" value="Renombrar">Renombrar<br>
                            <input type="radio" name="action" value="Eliminar">Eliminar<br>
                        </label><br>
                        <button type="submit" name="opt" value="aplicar">APLICAR</button>
                        <button type="submit" name="opt" value="salida">Salir</button>
                </form>
            </div>
        ';
        setcookie("capa",2,time()+60*60);
        setcookie("action",(isset($_POST['action']) && $_POST['action']!='')?$_POST['action']:false,time()+60*60);
    }
    else if($_COOKIE['capa']==2)
    {
        echo '<h1>Especificaciones</h1>';
        echo '
            <div class="contenedor">
                <form method="post" action="./exp_arch_act.php" target="_top" class="contenedor">
                    <select name="typeOfFile" required="on">
                        <optgroup>
                            <option value="Carpeta">Carpeta</option>
                            <option value="Archivo">Archivo</option>
                        </optgroup>
                    </select><br>
                    <label for="nomArch">Nombre del archivo:<br>
                        <input type="text" name="nomArch" required /><br><br>
                    </label><br>
                </form>
            </div>
        ';
        setcookie("capa",3,time()+60*60);
    //aquí comienza la parte de los archivos    
    } else if($_COOKIE['capa']==3)
        {
            //---variables---
            $usuario=$_COOKIE['usuario'];
            $casa=$_COOKIE['casa'];
            $action=$_COOKIE['action'];
            $typeOfFile=(isset($_POST['typeOfFile']) && $_POST['typeOfFile']!='')? $_POST['typeOfFile']:false;
            $nomArch=(isset($_POST['nomArch']) && $_POST['nomArch']!='')? $_POST['nomArch']:false;
            //---procesos---
            

            //---destrucción algunas de las cookies---
            setcookie("usuario",NULL,time()-1);
            setcookie("casa",NULL,time()-1);
            setcookie("capa",NULL,time()-1);
            //---redireccionamiento a la página de agradecimiento---
                //agregar URL; en esa página, el temporizador y nuevamente la URL, pero del inicio
        }


?>
</body>
</html>