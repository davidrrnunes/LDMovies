<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Homepage.css">
</head>
<body>

<div class="fundo">

<div class="logo">
    <img src="imagens/Logo.png">
</div>


<div class="Pesquisa">
    <form method="get">
        Pesquisar
        <label>
            <input name="pesquisatitulo" type="text"/
        </label>
        <input type="submit"  value="Pesquisar" name="BotaoPesquisa"/>
        <button  type="button" id="search" >Show</button>
        <button type="button" class="btn cancel" onclick="fecharPesquisa()">Close</button>
    </form>
</div>



<div class="allmovies">

    <?php

    $ldm = "dbname=postgres user=postgres password=postgres host=localhost
port=5432";

    $connection = pg_connect($ldm);
    if (!$connection) {
        die("Erro na ligacao");
    }

    $query = "SELECT * from filme ";

    $resultados = pg_query($connection, $query);

    $filmescount = pg_num_rows($resultados);
                    for($n = 1; $n <= $filmescount; $n++) {
                        $rows = pg_query("select * from filme where nr='".$n."' order by titulo ");
                        $filmes = pg_fetch_row($rows);

                        echo
                            ' <div class="individualmovie">
        <h1>' . $filmes[0] . '</h1>
        <h2>' . $filmes[1] . '</h2>
        <h3>' . $filmes[4] . ' </br>
            ' . $filmes[5] . ' </br>
            ' . $filmes[6] . ' </br>
        </h3>
    </div>';
                    }


    pg_close($connection);
    ?>


</div>



</div>



<?php

$ldm = "dbname=postgres user=postgres password=postgres host=localhost
port=5432";

$connection = pg_connect($ldm);
if (!$connection) {
    die("Erro na ligacao");
}
$pesquisatitulo = $_GET['pesquisatitulo'];


$pesquisa = pg_query("SELECT * from filme where titulo='$pesquisatitulo'");

$resultados = pg_fetch_row($pesquisa);


echo

    '<div class="filmepesquisa">
   
   
        <div class="filmepesquisaindividual">
        <h1>' . $resultados[0] . '  </h1>
        <h2>' . $resultados[1] . ' </h2> 
        <h3>' . $resultados[4] . ' </br>
            ' . $resultados[5] . ' </br>
            ' . $resultados[6] . ' </br>
        </h3>
        </div>
    
    </div>';
pg_close($connection);

?>

<script>
    let openindex = document.getElementById("search");

    openindex.addEventListener("click", function() {
        console.log("filmepesquisa");

        document.querySelector(".filmepesquisa").classList.add("show");
    });


    function fecharPesquisa() {
        document.querySelector(".filmepesquisa").classList.remove("show");
    }

</script>
</body>
</html>