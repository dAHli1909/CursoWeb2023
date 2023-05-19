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
        const CONSTANTE="9*10^9 Nm^2/C^2";//no llevan $
        echo CONSTANTE,"<br>";
        define("CONS2", "Hola,soy?");
        echo CONS2;
        //entero
        $var1=1;
        $var2=6;
        //flotantes
        $float1=3.1416;
        //Nulos
        $Nulo=NULL;
        echo "<br>";
        echo $Nulo;
        //Cadenita
        $cad='Soy una cadena';
        $bool=true;
        echo "<br>", $var1, "<br>", $cad,"<br>";
        print "Soy un print ";//print no funciona con varios parámetros, a diferencia de echo
        print("Soy un print");
        printf(" Quisiera poner ciertas cosas en tu corazón: %s",$cad);
        echo "<br>";
        var_dump($var2);
        var_dump($cad);
        var_dump($bool);
        echo "<br>".$var1."<br>".$cad."<br>";//->concatenación: .
        echo "<h1>".$cad."</h1>";
        $concat="<br>".$var1."<br>".$cad."<br>";
        echo "Concat:".$concat;
        $entero1=5;
        $entero2=15;
        $entero3=5;
        $entero3 = $entero2 - $entero1;
        echo "Entero3 ".$entero3."<br>";
        echo "+=".$entero1+=-$entero2,"<br>";
        $arregloA[0]="Hola";
        $arregloA[1]="soy";
        $arregloA[2]="Daniel";
        $arregloA[3]="y";
        $arregloA[4]="tu";
        for($contador=0;$contador<=4;$contador++)
        {
            echo $arregloA[$contador]."<br>";
        }
        $arregloB=array("Hello"," there,"," my friend");
        for($contador=0;$contador<3;$contador++)
        {
            echo $arregloB[$contador]."<br>";
        }

        $arregloC=array
        (
            1=>"Hey",
            2=>"Jude",
        );
        echo "<br>".$arregloC[2]."<br>";
        array_push($arregloA, "Yo", "Soy", "Hanji");//agregas conjuntos puntuales
        for($contador=0;$contador<=7;$contador++)
        {
            echo $arregloA[$contador]." ";
        }
        $delirio=array_pop($arregloA);//saca el final del array
        echo "<br>".$delirio;
        echo "<br>"."<br>";
        $delirio2=array_merge($arregloA,$arregloB,$arregloC);//obtienes una concatenación
        for($contador=0;$contador<=11;$contador++)
        {
            echo $delirio2[$contador]." ";
        }
        echo "<br>"."<br>";
        $delirio3=implode("0",$delirio2);//transforma al arreglo en una cadena, con un espacio, el cual es opcional
        echo $delirio3;
        echo "<br>"."<br>";
        $mambo="Un, doh, treh, maaaaMMMMMMMBOOOOOO";//transforma a la cadena en arreglo
        $explode=explode(" ", $mambo);
        for($contador=0;$contador<=3;$contador++)
        {
            echo $explode[$contador]." ";
        }
        echo "<br>"."<br>";
        //explode con límite
        $animales="ajolote, cebra, araña, mantis, humano, chango, gorila, león, centauro, dragón, rinoceronte";
        $explode2=explode(",",$animales, 6);
        $longitud=count($explode2); //cuenta el max, que sería justamente el valor de explode limitada
        for($contador=0;$contador<$longitud;$contador++)
        {
            echo $explode2[$contador]."";//se imprime con espacios debido a que YA forman parte de la cadena y solamente se elimina la ','
        }
        $aguas=array("Jamaica", "Limón","Horchata");
        $busca=array_search("Limón",$aguas);//busca la localidad del arreglo
        echo"<h1>".$busca."</h1>";

        $saludo="Hola, soy Dani y no c ";
        echo strlen($saludo);//longitud cadena
        echo "<br>"."<br>";
        $mensaje="estoy emocionado";
        echo strtoupper($mensaje);//lo pone en mayúsculas
        echo "<br>"."<br>";
        $mensaje2="HOLA, AMOR";
        echo strtolower($mensaje2);//en minúsculas
        echo "<br>"."<br>";
        $correo="danielbaca1752@gmail.com";
        echo strstr($correo,"@")."<br>";//separa a partir del caracter dado
        echo strstr($correo,"@",true);//separa y obtiene la parte previa
        echo "<br>"."<br>";
        
        echo substr("Me llamo Santiago", 9, 8);//recorta una cadena; 9=>valor inicial, 8=>longitud de cadena especficada
        echo substr("Me llamo Santiago", -2, 2);//recorta desde el final
        echo "<br>"."<br>";

        $array=array(5,6,8,9,1);
        echo shuffle($array);//desordena

        /*echo sort();//ordena de mayor a menor 
        echo rand(1,5);//numero random
        echo count();//strlen para arreglos; dice cuántas localidades tiene
        echo chr();*/ //genera un caracter a partir de un numero ; si tiene 75, da el caracter en ascii

        sumar(5,6);
        function sumar($num1,$num2){
            echo $num1+$num2."<br>";
        }
        
        $numerito=55;
        if($numerito%5==0){
            function DIV5($multiplo){
                echo $multiplo/5;
            }
        }
        DIV5(25);

   ?>
</body>
</html>