<?php

define('BASE_URL', '/devsRN');

$host = 'localhost';
$db   = 'devs_do_rn';
$user = 'postgres';
$pass = 'Bolino123';
$port = '5432';

$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
    $conexao = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
}