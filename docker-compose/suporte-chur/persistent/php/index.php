<?php

echo "<h1>Informações sobre o PHP</h1>";
echo "<h3> Testando os serviços do PHP </h3>";
if (imagetypes() & IMG_PNG) {
    echo "1 - O suporte a PNG está ativado";
    echo "<br>";
}

echo "<h3> Chamando o PHP Info </h3>";

phpinfo();

echo "<h3> Testando conexões a Banco de Dados </h3>";

echo "<H4> 1 - MariaDB </H4>";
// Configurações de acesso
$servername = "172.18.0.1";
$username = "andre.gustavo";
$password = "!A871902#";
$database = "";
$port = "3306";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database, $port);

// Checa conexão
if ($conn->connect_error) {
  die("<br> Erro de conexão ao MariaDB:<br>" . $conn->connect_error);
} else {
    echo "<br>";
    echo "Conexão com MariaDB OK!";
    echo "<br>";
}

/*

echo "Teste do Banco de Dados Postgres";

/*
// Configurações de acesso
$servername = "postgres";
$username = "postgres";
$password = "senha_exemplar_postgres";
$database = "db_postgres_exemplo";
$port = "5432";

$con_string = "host={$servername} port={$port} dbname={$database} user={$username} password={$password}";
$conn = pg_connect($con_string) || die('Erro de conexão ao Postgres');
echo "<br>";
echo "Conexão com Postgres OK!";
echo "<br>";
echo "<br>";

echo "Teste do Banco de Dados Redis";
// Configurações de acesso
$servername = "redis";
$password = null;
$port = 6379;

$redis = new Redis();
$redis->connect($servername, $port);
$redis->auth($password);
echo "<br>";
if ($redis->ping()) {
    echo "Conexão com Redis OK!";
}else{
    die('Erro de conexão ao Redis');
}
*/
?>