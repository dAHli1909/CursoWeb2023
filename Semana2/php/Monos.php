<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="./Monos.php" target="_self">
        <fieldset>
            <legend> Actividad de los changuitos </legend>
                <label for="frase">Frase:<br>
                    <input name="frase" id="frase" type="text"required="on">
                </label><br><br>
                <select id="op" name="op" required="on">
                    <optgroup>
                        <option value="caso1">Frase</option>
                        <option value="caso2">Palabra por palabra</option>
                        <option value="caso3">Frase desordenada</option>
                    </optgroup>
                </select>
        </fieldset>
        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
    <table border="1" style="border-collapse:separate;" cellpadding=30px align="center">
        <tbody>
            <tr><td>
<?php
    /*
    salir: FECHA, HORA Y ZONA DE GENERACIÓN SELECCIONABLE(para la consulta); existe una fecha de creación rándom 
    tener 3 opciones: 
        salir el arreglo como tal en un punto dado con letras alrededor
        palabra por palabra en desorden 
        lo mismo que en el primero, pero con palabras desordenadas
    Num. rand del libro 
    */  
        // $frase="Holi, soy Daniel";
        // $num=array(2,5,3,6);
        // sort($num);
        // echo var_dump($num).'<br>';
        // //sort($frase);
        // echo var_dump($frase).'<br>';
        // echo count($num).'<br>';
        // echo chr(rand(32,128));
    $frase=(isset($_POST["frase"])&&$_POST["frase"]!="")?$_POST["frase"]:false;    
    $select=(isset($_POST["op"])&&$_POST["op"]!="")?$_POST["op"]:false;
    if($select!="caso1")
    {
        //explotar cadena, generar arreglo y shuffle
        $fex=explode(" ",$frase);
        //var_dump($fex);
        
        if($select=="caso2")
        {
            //que la variable de conteo sea igual a cont (contar palabras para generar el while)
            $cont=count($fex);
        }
        if($select=="caso3")
        {
            //implotar en cadena
            shuffle($fex);
            $fin=implode(" ",$fex);
            $fex=explode(" ",$fin,1);
            
            $cont=1;
        }
    }
    else
    {
        //dejarla como cadena; tal vez ni siquiera haga falta el else
        $fex=explode(" ",$frase,1);
        $cont=1;
    }
    echo 'FRASE'.var_dump($frase).'<br>';
    echo 'FEX'.var_dump($fex).'<br>';
    echo 'CONT'.var_dump($cont).'='.$cont.' '.'<br>';
    echo 'SELECT'.var_dump($select).'<br>';
    echo '<br><br>';
    do
    {
        $r=rand(1,10000);
        if($r!=1)
        {
                echo chr(rand(33,100));
        }
        else
        {
                echo '<font color="#FF0000">'.$fex[$cont-1].'</font>';
                $cont--;
        }
    }
    while($cont!=0);
    while(rand(1,10000)!=1)
    {
        echo chr(rand(32,100));
    }
?>
            </td></tr>
        </tbody>
    </table>
</body>
</html>