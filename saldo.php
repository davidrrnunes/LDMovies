<?php
include("session.php");
?>

<?php
$ldm = "dbname=postgres user=postgres password=postgres host=localhost
port=5432";

/*transferir*/
$connection = pg_connect($ldm);
if (!$connection) {
    die("Erro na ligacao");
}
$destino = $_GET['destino'];
$transmontante= $_GET['transmontante'];

$query =  "SELECT saldo from cliente where username='$destino'";

$resultado= pg_query($connection, $query);
$saldodestino =pg_fetch_result($resultado,0,0);

$saldodestino = $saldodestino + $transmontante;

$resultado = pg_query("update cliente set saldo='".  $saldodestino ."' where username='$destino'");

$resultado= pg_query($connection, $query);


/*Subtrair*/
$query =  "SELECT saldo from cliente where username='bruh'";

$resultado= pg_query($connection, $query);
$saldo =pg_fetch_result($resultado,0,0);

$saldo = $saldo - $transmontante;

$resultado1 = pg_query("update cliente set saldo='".  $saldo ."' where username='bruh'");

$resultado1= pg_query($connection, $query);

pg_close($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saldo</title>
    <link rel="stylesheet" type="text/css" href="saldo.css">
</head>
<body>
<div class="fundo">

    <div class="logo">
        <a href="Homepage.php">
        <img src="imagens/Logo.png">
        </a>
    </div>




    <?php
    /*carregar*/
    $ldm = "dbname=postgres user=postgres password=postgres host=localhost
port=5432";

    $connection = pg_connect($ldm);
    if (!$connection) {
        die("Erro na ligacao");
    }
    $montante = $_GET['montante'];


    $query =  "SELECT saldo from cliente where username='bruh'";

    $resultado= pg_query($connection, $query);
    $saldo =pg_fetch_result($resultado,0,0);

    $saldo = $saldo + $montante;


    $resultado1 = pg_query("update cliente set saldo='".  $saldo ."' where username='bruh'");

    $resultado1= pg_query($connection, $query);
    echo '
    <div class="Saldoatual">
    <h2>Saldo</h2>
    <h3>' .$saldo. '</h3>
    </div>';
    pg_close($connection);

    ?>


    <div class="alterarSaldo">

        <div class="popupbuttonSaldo">

        </div>


        <div class="popupSaldo">

            <form method="get" >
                <div class="AdicionarSaldo">
                    Adicionar saldo <br/>
                    <label>
                        Quantia: <input name="montante" type="number"/> <br/>
                    </label>

                    <input type="submit" value="Charge" name="alterar"/>
                    <button type="button" class="btn cancel" onclick="closeFormAdd()">Close</button>

                </div>
            </form>

        </div>
    </div>


    <div class="transferir">
        <form method="get">
            <div class="transferirSaldo">
                Transferir<br/>
                <label>
                    Cliente: <input name="destino" type="text"/><br/>
                    Quantia: <input name="transmontante" type="number"/> <br/>
                </label>

                <input type="submit" value="Transfer" name="alterar"/>
                <button type="button" class="btn cancel" onclick="closeFormAdd()">Close</button>
            </div>

        </form>

    </div>








</div>





</body>
</html>

