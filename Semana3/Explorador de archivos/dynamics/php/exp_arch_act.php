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
   //if($_COOKIE['capa']!=NULL)
    if(!(isset($_POST['opt']) && $_POST['opt']!='')?true:false && $_COOKIE['capa']!=2)//cuando no hay variable, se ejecuta
    {
        $usuario=(isset($_POST['nombre']) && $_POST['nombre']!='')?$_POST['nombre']:false;
        echo '<h1>¿Qué quieres hacer, '.$usuario.'?</h1>';
        echo '
            <div class="contenedor">
                <form method="post" action="./exp_arch_act.php" target="_top">
                        <label for="action">
                            <input type="radio" name="action" value="Crear" required>Crear archivo<br>
                            <input type="radio" name="action" value="Renombrar" required>Renombrar<br>
                            <input type="radio" name="action" value="Eliminar" required>Eliminar<br>
                        </label><br>
                        <button type="submit" name="opt" value="aplicar">APLICAR</button>
                        <button type="submit" name="opt" value="salida">Salir</button>
                </form>
            </div>
        ';
        setcookie("capa",2,time()+60*60);
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
        ';
        $action=(isset($_POST['action']) && $_POST['action']!='')?$_POST['action']:false;
        if($action=='Renombrar')   
        {
            echo '
                    <label for="Renom">Renombrar a:<br>
                        <input type="text" name="Renom" required /><br><br>
                    </label><br>
            ';
        }
        echo '
                    <button type="submit" name="opt" value="aplicar">APLICAR</button>
                    <button type="submit" name="opt" value="salida">Salir</button>
                </form>
            </div>
        ';
        setcookie("action",$action,time()+60*60);
        setcookie("capa",3,time()+60*60);
    //aquí comienza la parte de los archivos y el registro   
    } else if($_COOKIE['capa']==3)
        {
            //---variables---
            $usuario=$_COOKIE['usuario'];
            $casa=$_COOKIE['casa'];
            $action=$_COOKIE['action'];
            $typeOfFile=(isset($_POST['typeOfFile']) && $_POST['typeOfFile']!='')? $_POST['typeOfFile']:false;
            $nomArch=(isset($_POST['nomArch']) && $_POST['nomArch']!='')? $_POST['nomArch']:false;
            $renom=(isset($_POST['Renom']) && $_POST['Renom']!='')? $_POST['Renom']:false;
            $ruta="../../lib/";
            //var_dump($nomArch);
            //---procesos---
            if(!file_exists($ruta.$nomArch) || $action!='Crear')
            {
                $gen=true;
                if($action=='Crear')
                {
                        if($typeOfFile=='Carpeta')
                        {
                                mkdir($ruta.$nomArch);
                        }
                        else if($typeOfFile=='Archivo')
                        {
                            opendir("../../lib");
                            $archivo=fopen($ruta.$nomArch,"w+");
                            fclose($archivo);
                            closedir();
                        }
                }
                else if($action=='Renombrar')
                    {
                        if($typeOfFile=='Carpeta')
                        {
                            rmdir($ruta.$nomArch);
                            mkdir($ruta.$renom);
                        }
                        else if($typeOfFile=='Archivo')
                        {
                            $archivo=fopen($ruta.$nomArch,"r+");
                            // var_dump($nomArch,$renom,$ruta,$archivo);
                            // var_dump(opendir("../../lib"));
                            opendir("../../lib");
                            //$archrenom=fopen($ruta.$renom,"w+");
                            // $contenido=fread($ruta.$nomArch,sizeof($ruta.$nomArch));
                            // fwrite($ruta.$renom,$contenido);
                            //var_dump(copy($ruta.$nomArch,$ruta.$renom));
                            copy($ruta.$nomArch,$ruta.$renom);
                            fclose($archivo);
                            unlink($ruta.$nomArch);
                            closedir();

                        }
                    }
                    else if($action=='Eliminar')
                        {
                            // echo 'Eliminar';
                            if($typeOfFile=='Carpeta')
                            {
                                opendir("../../lib");
                                // var_dump(rmdir($ruta.$nomArch));
                                rmdir($ruta.$nomArch);
                                closedir();
                            }
                            else if($typeOfFile=='Archivo')
                            {
                                unlink($ruta.$nomArch);
                            }
                        }

            }
            else
            {
                echo "Ya existía dicha carpeta o archivo. Por practicidad, reintenta con otro nombre";
                $gen=false;
            }
            //registro de acciones; supongo que va a ser un txt en el cual irá leyendo línea por línea
            opendir("../../lib/!regis");
            $registros=fopen('../../lib/!regis/registros.txt','a+'); 
            if($gen)
            {
                $cadena="El usuario $usuario de la casa $casa ha tomado la acción de $action el archivo $nomArch";
                if($action=='Renombrar')
                {
                    $cadena=$cadena."a $renom";
                }
                
                fwrite($registros, "$cadena\n");
            }
            echo'
                <h1>Registro</h1>
                <form method="post" action="./agradecimiento.php" target="_top" class="contenedor">
                    <ul>
            ';
            // foreach($ref as $valores)
            // {
            //     echo '<li>'.$valores.'</li>';
            // }
            $registros=fopen('../../lib/!regis/registros.txt','r');
            while(!feof($registros))
            {
                echo '<li>'.fgets($registros).'</li>';
            }
            echo '
                    </ul>
                    <button type="submit" id="apf" align="center">OK</button>
                </form>
            ';
            fclose($registros);
            closedir();
        }
?>
</body>
</html>