<?php
    $ldm = "dbname=postgres user=postgres password=postgres host=localhost
    port=5432";
    
        $connection = pg_connect($ldm);
        if (!$connection) {
            die("Erro na ligacao");
        }
?>