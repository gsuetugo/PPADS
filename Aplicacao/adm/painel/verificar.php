<?php
require_once('config/configuracao.php');

$url = new url();

session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] == 'NAO') {
    header('Location: /'.$url->getComplemento());
} else {
    $dados = new dados();
    $arrayParam = array($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);
    $sql_usuarios = 'SELECT id FROM usuarios WHERE id = ? AND nome = ? AND email = ?';
    $usuarios = $dados->getSQLGeneric($sql_usuarios, $arrayParam, FALSE);
    if (!$usuarios) {
        session_start();
        session_destroy();
        header('Location: /'.$url->getComplemento());
    }
}
