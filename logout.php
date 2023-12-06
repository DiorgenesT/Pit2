<?php
// Inicia a sessão
session_start();

// Limpa a variável de sessão "logged_in"
unset($_SESSION['logged_in']);

// Redireciona o usuário para a página de login
header("Location: login.php");
exit;
?>