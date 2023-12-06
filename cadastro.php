<?php
    
    session_start();

    include("conexao.php");

    $dia = $_POST["dia"];
    $nome = $_POST["nome"];
    $placa = $_POST["placa"];
    $veiculo = $_POST["veiculo"];
    $motivo = $_POST["motivo"];
    $origem = $_POST["origem"];
    $destino = $_POST["destino"];
    $prestador = $_POST["prestador"];
    $km = $_POST["km"];
    $valor = $_POST["valor"];
    $tabela = $_POST["tabela"];
    
    $sql="INSERT INTO $tabela (dia, nome, placa, veiculo, motivo, origem, destino, prestador, km, valor) 
        VALUES ('$dia', '$nome', '$placa', '$veiculo', '$motivo', '$origem', '$destino', '$prestador', '$km', '$valor')";

    if(mysqli_query($conexao, $sql)){
    	echo "Dados inseridos com sucesso! Redirecionando...";
	echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 3000);</script>"; // Redireciona para a página index.html após 3 segundos
	exit(); // Encerra a execução do script
    }
    else{
    	echo "Erro".mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);

?>