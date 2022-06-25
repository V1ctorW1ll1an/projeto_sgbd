<?php

$mysql = new mysqli("localhost", "root", "", "Comercio", 3306);

$mysql->set_charset("utf8");

$notConnected = !$mysql;

if ($notConnected) {
    echo "Erro: banco não conectado!";
}
