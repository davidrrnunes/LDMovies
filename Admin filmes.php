<?php

$ldm = "dbname=postgres user=postgres password=postgres host=localhost
port=5432";

$connection = pg_connect($ldm);
if (!$connection) {
    die("Erro na ligacao");
}
$filmetitulo = $_GET['filmetitulo'];
$filmeano = $_GET['filmeano'];
$filmepreco = $_GET['filmepreço'];
$ator1 = $_GET['filmeator1'];
$ator2 = $_GET['filmeator2'];
$ator3 = $_GET['filmeator3'];
$numero = $_GET['numero'];



$query = "INSERT into filme VALUES ('$filmetitulo', '$filmeano', '$filmepreco', '0', '$ator1', '$ator2', '$ator3', '$numero')";

$filmes = pg_query($connection, $query);

$removertitulo = $_GET['removertitulo'];

$query = "delete from filme where titulo='$removertitulo'";

$filmes = pg_query($connection, $query);

echo '$removertitulo <h1>foi removido</h1>';

$filmes = pg_query($connection, "select * from filme") or die;
$filmes = pg_fetch_all($filmes);

foreach($filmes as $linha)
{
    print $linha['titulo'] . "<br />";
    print $linha['ano'] . "<br />";
    print $linha['preco'] . "<br />";
    print $linha['desconto']. "<br />";
    print $linha['Ator1'] . "<br />";
    print $linha['Ator2'] . "<br />";
    print $linha['Ator3'] . "<br />";
    print $linha['nr'] . "<br />";
}



pg_close($connection);
?>

