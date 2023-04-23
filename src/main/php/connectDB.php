<?php

    # - | -- Connection DATABASE query -- | --

    // -- | --  Variables Connection -- | --
    $dbHost = 'localhost';
    $dbuser = 'root';
    $dbPass = '';
    $dbName = 'solidarityPath';

    // -- | -- Execute query Connection -- | --
    $mysqli = new mysqli($dbHost,$dbuser,$dbPass,$dbName);

    // -- | -- Teste of Connection -- | -- 
    // if($mysqli->connect_errno) {
    //     echo "Erro connection";
    // } else {
    //     echo "DATABASE : Connect";
    // };

?>