<?php
    $include=include('.\config.php');
    $con=connect();

    if($include && $con)
    {
        $ID_USUARIO=1;
        $descripcion="Descripción nueva";
        $fecha="01-06-2023";
        $hora="10:00";
        $corazon=1;
        $n_comentarios=3;
        $n_retuits=5;

        $peticion="INSERT INTO publicacion VALUES (0, $ID_USUARIO, '$descripcion', '$fecha', '$hora', $corazon, $n_comentarios, $n_retuits)";
        //$query=mysqli_query($con,$peticion);//si es un comando que envía info, da TRUE si es exitoso y FALSE si no; si manda info, da un valor resultante
        // var_dump($query);//true o false

        $sql="SELECT * FROM publicacion";
        $query=mysqli_query($con,$sql);
        //var_dump($query);
        //$datos=mysqli_fetch_array($query); =>regresa los mismos valores que abajo, aparte de localidades correspondientes a cada columna
        //$datos=mysqli_fetch_assoc($query);
        //var_dump($datos);
        while($row=mysqli_fetch_assoc($query))
        {
            echo '<br><br><br><br>';
            var_dump($row['n_comentarios']);
        }
    }

?>