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
  <title>Consultar Acionamentos</title>
  <link rel="stylesheet" type="text/css" href="consulta.css">
</head>
<body>
  <h1>Consulta de Acionamentos</h1>
  <form method="GET" action="pesquisa.php">
    <label for="tabela">Selecione o Cliente:</label>
    <select name="tabela" id="tabela">
      <option value="mundial">Mundial</option>
      <option value="autoavance">Autoavance</option>
      <option value="hrproteção">HRProteção</option>
      <option value="associbraz">Associbraz</option>
      <option value="topvel">Topvel</option>
      <option value="privilege">Privilege</option>
      <option value="bluecar">Bluecar</option>
      <option value="santorine">Santorine</option>
      <option value="miracar">Miracar</option>
      <option value="allprotected">Allprotected</option>
      <option value="mftruck">MFTruck</option>
      <option value="dnabrasil">DNABrasil</option>
      <option value="gpsrs">Gpsrs</option>
      <option value="redetruck">RedeTruck</option>
      <option value="convert">Convert</option>
      <option value="vembrasil">Vem Brasil</option>
      <option value="age">Age</option>
      <option value="melolocaliza">Melo Localiza</option>
      <option value="gpscar">Gps Car</option>
    </select>
    <label for="data_inicial">Data Inicial:</label>
    <input type="date" name="data_inicial" id="data_inicial">
    <label for="data_final">Data Final:</label>
    <input type="date" name="data_final" id="data_final">
    <label for="placa">Pesquisar por placa:</label>
  <input type="text" name="placa" id="placa" style="margin-bottom: 10px;">
  <div>
    <input type="submit" value="Pesquisar">
  </form>
   <form action="logout.php" method="POST">
        <button type="submit" name="logout" class="sair-botao">Sair</button>
    </form>
    </div>
</body>
</html>