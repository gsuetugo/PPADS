<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'SIM') {
    header("Location: painel");
}
require_once('config/configuracao.php');
$url = new url();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <meta name="author" content="Gabriel Isacc, Giovanni Rodrigues, Gustavo Iquejiri, Marcelo Yamashita">
    <title>Painel ADM</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body class="text-center h-100 d-flex align-items-center justify-content-center">
    <form class="border rounded-lg shadow col-lg-3 col-md-10 col-10 py-5 d-flex flex-column" id="formLogin">
        <p>Painel Administrativo</p>
        <label for="inputEmail">Email:</label>
        <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Email" required autofocus>
        <label for="inputSenha">Senha:</label>
        <input type="password" id="inputSenha" class="form-control mb-3" placeholder="Senha" required>
        <div id="resposta"></div>
        <button class="btn btn-primary btn-block" type="submit">Entrar</button>
    </form>
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
