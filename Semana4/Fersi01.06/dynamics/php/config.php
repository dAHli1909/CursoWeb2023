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
        const DBHOST="localhost";
        const DBUSER="root";
        const PASSWORD='';
        const DB="tuiter";

        function connect(){
            $connect=mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
            return $connect;
        }
        //var_dump(connect());
        
    ?>
</body>
</html>