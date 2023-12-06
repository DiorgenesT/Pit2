<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Redireciona para a página de login
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastrar Acionamento</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<h1>Cadastro de Acionamentos</h1>
	<form action="cadastro.php" method="post">
    <label for="dia">Data:</label>
    <input type="date" id="dia" name="dia">
    
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome"><br><br>
    
    <label for="placa">Placa:</label>
    <input type="text" id="placa" name="placa">
    
    <label for="veiculo">Veículo:</label>
    <input type="text" id="veiculo" name="veiculo"><br><br>
    
    <label for="motivo">Motivo:</label>
    <input type="text" id="motivo" name="motivo">
    
    <label for="origem">Origem:</label>
    <input type="text" id="origem" name="origem"><br><br>
    
    <label for="destino">Destino:</label>
    <input type="text" id="destino" name="destino">
    
    <label for="prestador">Prestador:</label>
    <input type="text" id="prestador" name="prestador"><br><br>
    
    <label for="km">KM:</label>
    <input type="number" id="km" name="km">
    
    <label for="valor">Valor:</label>
    <input type="number" id="valor" name="valor" step="0.01"><br><br>
    
    <label for="tabela">Cliente:</label>
    <select id="tabela" name="tabela">
        <option value="mundial">Mundial</option>
        <option value="autoavance">Auto Avance</option>
        <option value="hrprotecao">HR Proteção</option>
        <option value="associbraz">Associbraz</option>
        <option value="topvel">Topvel</option>
        <option value="privilege">Privilege</option>
        <option value="bluecar">Blue Car</option>
        <option value="santorine">Santorine</option>
        <option value="miracar">Miracar</option>
        <option value="allprotected">All Protected</option>
        <option value="mftruck">MF Truck</option>
        <option value="dnabrasil">DNA Brasil</option>
        <option value="gpsrs">GPSRS</option>
        <option value="convert">Convert</option>
        <option value="vembrasil">Vem Brasil</option>
        <option value="age">Age</option>
        <option value="gpscar">Gps Car</option>
        <option value="melolocaliza">Melo L</option>
        <option value="redetruck">Rede Truck</option>
    </select>
    
<div>
    <form action="submit.php" method="POST">
        <input type="submit" value="Cadastrar" class="enviar-botao">
    </form>

    <form action="logout.php" method="POST">
        <button type="submit" name="logout" class="sair-botao">Sair</button>
    </form>
    
   <form action="consulta.php" method="POST">
    <button type="submit" name="Consulta" class="sair-botao">Consultar</button>
</form>
    
</div>
	<!-- Aqui vai o código HTML da página "atendimento.html" -->



</body>
</html>