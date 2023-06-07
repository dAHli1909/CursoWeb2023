<?php
    require "config.php";
    $conexion = connect();
    if(!$conexion)
    {
        echo "NO se pudo conectar la base en insertar.php";
    }else{
        $nombre=(isset($_POST['nombre']) && $_POST['nombre'] !='')? $_POST['nombre']:false;
        $altura=(isset($_POST['altura']) && $_POST['altura'] !='')? $_POST['altura']:false;
        $peso=(isset($_POST['peso']) && $_POST['peso'] !='')? $_POST['peso']:false;
        $exp_base=(isset($_POST['exp_base']) && $_POST['exp_base'] !='')? $_POST['exp_base']:false;
        if($altura && $nombre && $peso && $exp_base)
        {
        $sql="INSERT INTO pokemon (pok_name, pok_height, pok_weight, pok_base_experience) 
        VALUES ('$nombre', '$altura', '$peso', '$exp_base')";
        $res=mysqli_query($conexion,$sql);
        
            if(!$res)//si no se hizo nah
            {
                $respuesta=array("insert"=>false, "mensaje"=>'No se ha creado el pokemon');
            }else{
                $repuesta=array("insert"=>true,"mensaje"=>'Se ha creado el pokemon');
            }
        }else{
            if(!$nombre){
                $respuesta=array("insert"=>false,"mensaje"=>"No se especificó nombre");
            }
            if(!$altura){
                $respuesta=array("insert"=>false,"mensaje"=>"No se especificó altura");
            }
            if(!$peso){
                $respuesta=array("insert"=>false,"mensaje"=>"No se especificó peso");
            }
            if(!$exp_base){
                $respuesta=array("insert"=>false,"mensaje"=>"No se especificó exp_base");
            }
        }
    }    
    //echo $respuesta['mensaje'];
    echo json_encode($respuesta);
?>