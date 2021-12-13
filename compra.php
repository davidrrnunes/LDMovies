<?php
include("session.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compra</title>
    <link rel="stylesheet" type="text/css" href="compra.css">
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
require('baseDados.php');
$rows= pg_query("select * from filmes where id='". $i . "'");
$filme = pg_fetch_row($rows);
    echo'
<div class="purchaseForm">
                <form name="purchaseForm">
                       <button type="button" onclick="finalizar(' . $i . ');" value="' . $i . '">Finalizar Compra!</button>
                </form>
            </div>';
?>
    pg_close($connection);
</div>

<script type="text/javascript" src="menu.js"></script>
</body>
</html>
