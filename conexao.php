<?php

session_start();

$servidor="br54.hostgator.com.br";
$usuario="monume18_admin";
$senha="Di140191*";
$dbname="monume18_atendimentos";

$conexao=mysqli_connect($servidor, $usuario, $senha, $dbname);
if(!$conexao){
	die("Houve um erro: ".mysqli_connect_error());
}
?>