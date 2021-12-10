<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Homepage.css">
</head>
<body>

<div class="fundo">
</div>

<div class="logo">
    <img src="imagens/Logo.png">
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

                            '
                <div class="individualmovie">
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

</body>
</html>