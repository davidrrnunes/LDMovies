<?php
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filme</title>
    <link rel="stylesheet" type="text/css" href="filme.css">
</head>
<body>
<div class="fundo">

    <div class="logo">
        <a href="Homepage.php">
            <img src="imagens/Logo.png">
        </a>
    </div>



    <?php
    $ldm = "dbname=postgres user=postgres password=postgres host=localhost
port=5432";

    $connection = pg_connect($ldm);
    if (!$connection) {
        die("Erro na ligacao");
    }

    $i = $_GET['i'];

    $rows= pg_query("select * from filme where nr='". $i ."'");

    $filme = pg_fetch_row($rows);


$rows= pg_query("select * from cliente where username='". $_SESSION['uname'] . "'");
$clientes = pg_fetch_row($rows);
$numColumns = pg_num_fields($rows);
$comprado = 0;
for ($j = 0; $j < $numColumns; $j++) {
    if($clientes[$j]!=$filme[0]){
        $comprado = 0;
    }
    else{
        $comprado=1;
    }
}
if($comprado==0){

echo '<button type="button" onclick="compra(' . $i . ')" value="' . $i . '">Comprar</button>';

}


            for($j = 0; $j < 7; $j++){
            echo '<h4>' . $filme[$j] . '</h4> ';

    }

    pg_close($connection);
    ?>


</div>


<script type="text/javascript" src="menu.js"></script>
</body>
</html>