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



pg_close($connection);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin_filmes</title>
    <link rel="stylesheet" type="text/css" href="Admin%20filmes.css">
</head>
<body>

<div class="fundo">

    <div class="logo">
        <a href="Homepage.php">
            <img src="imagens/Logo.png">
        </a>
    </div>

    <div class="formularios">

        <div class="popupbuttonAdd">

        </div>


        <div class="popupbuttonRem">

        </div>


        <div class="popupAdd">

            <form method="get" >
                <div class="Adicionar">
                    Adicionar filme <br/>
                    <label>
                        Título: <input name="filmetitulo" type="text"/> <br/>
                        Ano:  <input name="filmeano" type="number"/> <br/>
                        Preço: <input name="filmepreço" type="number"/> <br/>
                        Ator 1: <input name="filmeator1" type="text"/> <br/>
                        Ator 2: <input name="filmeator2" type="text"/> <br/>
                        Ator 3: <input name="filmeator3" type="text"/> <br/>
                        Número: <input name="numero" type="text"/> <br/>
                    </label>

                    <input type="submit" value="Submeter" name="adicionar"/>
                    <button type="button" class="btn cancel" onclick="closeFormAdd()">Close</button>

                </div>
            </form>

        </div>


        <div class="popupRem">

            <form method="get" >
                <div class="Remover">
                    Remover filme <br/>
                    <label>
                        Título: <input name="removertitulo" type="text"/> <br/>
                    </label>

                    <input type="submit" value="Remover" name="remover"/>
                    <button type="button" class="btn cancel" onclick="closeFormRem()">Close</button>

                </div>

            </form>

        </div>


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
            $rows = pg_query("select * from filme where nr='".$n."'");
            $filmes = pg_fetch_row($rows);


                echo

                    '   <div class="individualmovie">
        <h1>' . $filmes[0] . '  </h1>
        <h2>' . $filmes[1] . ' </h2> 
        <h3>' . $filmes[4] . ' </br>
            ' . $filmes[5] . ' </br>
            ' . $filmes[6] . ' </br>
        </h3>
    </div>';



        }
        ?>

    </div>



</div>


<script>
    let openindex = document.querySelector(".popupbuttonAdd");

    openindex.addEventListener("click", function() {
        console.log("popupAdd");

        document.querySelector(".popupAdd").classList.add("show");
    });

    let openindex2 = document.querySelector(".popupbuttonRem");

    openindex2.addEventListener("click", function() {
        console.log("popupRem");

        document.querySelector(".popupRem").classList.add("show");
    });


    function closeFormAdd() {
        document.querySelector(".popupAdd").classList.remove("show");
    }

    function closeFormRem() {
        document.querySelector(".popupRem").classList.remove("show");
    }
</script>



</body>
</html>
