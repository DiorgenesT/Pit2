<?php
// Informações de conexão com o banco de dados
$servidor = "br54.hostgator.com.br";
$usuario = "monume18_admin";
$senha = "Di140191*";
$banco = "monume18_user";

// Conexão com o banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtém os dados do formulário
  $usuario = $_POST["usuario"];
  $senha = $_POST["senha"];

  // Consulta o banco de dados para verificar as credenciais
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
  $result = $conn->query($sql);

  // Verifica se as credenciais foram encontradas na tabela
if ($result->num_rows > 0) {
  // Cria uma variável de sessão para indicar que o usuário está logado
  session_start();
  $_SESSION['logged_in'] = true;
  // Redireciona para a página desejada
  header("Location: index.php");
    exit;
  } else {
    // Exibe uma mensagem de erro caso as credenciais sejam inválidas
    echo "Usuário ou senha inválidos";
  }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <link rel="stylesheet" type="text/css" href="login.css">

</head>
  
<img src="img/logo.jpg" alt="Logo da empresa" class="logo" style="width: 200px;">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="usuario">Usuário:</label>
    <input type="text" name="usuario" required>
    <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>
    <br>
    <input type="submit" value="Entrar">
  </form>
</body>
</html>