<?php

    $serverName = getenv("DB_SERVER"); // o IP del servidor
    $connectionOptions = [
        "Database" => getenv("DB_NAME"),
        "Uid" => getenv("DB_USER"),
        "PWD" => getenv("DB_PASSWORD")
    ];

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
?>