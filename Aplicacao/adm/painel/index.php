<?php
require_once('verificar.php');
require_once('config/configuracao.php');

$url = new url();
$pg_acessada = new pg_acessada();
$crud_site = new dados();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <meta name="author" content="Gabriel Isacc, Giovanni Rodrigues, Gustavo Iquejiri, Marcelo Yamashita">
    <title>Painel ADM</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
    <?php
    require_once('inc/topo.php');
    ?>
    <div class="wrapper">
        <?php
        require_once('inc/navbar.php');
        ?>
        <div class="container-fluid py-4" id="conteudoPage">
            <?php
            if ($pg_acessada->getTipoAtual()) {
                if (file_exists('inc/'.$pg_acessada->getAtual().'-'.$pg_acessada->getTipoAtual().'.php')) {
                    require_once('inc/'.$pg_acessada->getAtual().'-'.$pg_acessada->getTipoAtual().'.php');
                } else {
                    require_once('inc/404.php');
                }
            } elseif (file_exists('inc/'.$pg_acessada->getAtual().'.php')) {
                if ($pg_acessada->getAtual() <> 'home') {
                    require_once('inc/menu.php');
                }
                require_once('inc/'.$pg_acessada->getAtual().'.php');
            } else {
                require_once('inc/404.php');
            }
            ?>
        </div>
    </div>
    <script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>