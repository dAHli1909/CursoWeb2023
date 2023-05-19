<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/psicodel.ico" type="image/x-icon">
    <title>Ticketmaster2.0</title>
</head>
<body>
            <!--Nombre
            Apellido
            Zona (Al menos 4 opciones)
            Número de boletos (Hay un máximo de 15 boletos y un mínimo de uno)
            Artista (Al menos 4 opciones)
            Fecha 
            Lugar (Al menos 4 opciones)
            Si desean que su paquete incluya algún extra. (Al menos 3 opcionales)-->   
<?php
$nombre=(isset($_POST["nombre"])&&$_POST["nombre"]!="")?$_POST["nombre"]:false;
$apellido=(isset($_POST["apellido"])&&$_POST["apellido"]!="")?$_POST["apellido"]:false;
$numbol=(isset($_POST["numbol"])&&$_POST["numbol"]!="")?$_POST["numbol"]:false;
$zona=(isset($_POST["zona"])&&$_POST["zona"]!="")?$_POST["zona"]:false;
$artista=(isset($_POST["artista"])&&$_POST["artista"]!="")?$_POST["artista"]:false;
$lugar=(isset($_POST["lugar"])&&$_POST["lugar"]!="")?$_POST["lugar"]:false;
$fecha=(isset($_POST["fecha"])&&$_POST["fecha"]!="")?$_POST["fecha"]:false;
//ARTISTAS
if($artista=="Lorde")
{
    $ruta_img_artista="./img/lorde-coachella.webp";
}
else
{   
    if($artista=="Nujabes")
    {
        $ruta_img_artista="./img/Nujabes-e1423083773740.webp";
    }
    else
    {
        if($artista=="Miki Matsubara")
        {
            $ruta_img_artista="./img/miki.jpg";
        }
        else
        {//Mon Laferte
            $ruta_img_artista="./img/mon.jpg";
        }
    }
}
//LUGAR&&ZONA
if($lugar=="Foro Sol")
{
    $ruta_img_lugar="./img/fs.jpg";
    $ruta_img_zona="./img/forosol-zona.jpg";
}
else
{   
    if($lugar=="Palacio de los deportes")
    {
        $ruta_img_lugar="./img/pd.jpg";
        $ruta_img_zona="./img/pd-zona.jpg";
    }
    else
    {
        if($lugar=="Auditorio Nacional")
        {
            $ruta_img_lugar="./img/au.jpg";
            $ruta_img_zona="./img/an-zona.png";
        }
        else
        {//Teatro metropolitan
            $ruta_img_lugar="./img/teatro.jpg";
            $ruta_img_zona="./img/teatro-zona.webp";
        }
    }
}
if($numbol>15)
{
    echo 'Por alguna extraña razón, pudiste pedir más de 15 boletos. Faltaron:'.$numbol-15;
}
else
{
    if($numbol<=0)
        echo '¿Quieres boletos imaginarios o qué?';
    for($i=0;$i<$numbol;$i++)
    {
        echo'
            <table border="1" style="border-collapse:separate;" cellpadding=30px align="center">
                <thead>
                    <tr><th colspan="4" align="center">Boletitossss para '.$artista.'</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">'.$nombre.'</td>
                        <td align="center">'.$apellido.'</td>
                        <td align="center">'.$fecha.'</td>
                        <td rowspan="2" align="center"><img src='.$ruta_img_artista.' height="300" ></td>
                    </tr>
                    <tr>
                        <td align="center">'.$lugar.'<br><img src="'.$ruta_img_lugar.'" height="120"></td>
                        <td align="center">'.$zona.'<br><img src="'.$ruta_img_zona.'" height="120"></td>
                        <td><center>Extras:<br></center>
                            <ul>';
                                if($extras=(isset($_POST["extras"])&&$_POST["extras"]!="")?$_POST["extras"]:false!=false){
                                    foreach($extras as $valores)
                                        echo '<li>'.$valores.'</li>';
                                }else{
                                        echo '<li> No hay extras</li>';
                                }
        echo'               </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">¡Esperamos lo disfrutes!</td>
                    </tr>
                </tbody>
            </table>
            '; 
    }
}
?>   
</body>
</html>