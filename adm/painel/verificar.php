<?php
require_once('config/configuracao.php');

$url = new url();

session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] == 'NAO') {
    header('Location: /'.$url->getComplemento());
} else {
    $dados = new dados();
    $sql_usuarios = 'SELECT id_admin FROM admin WHERE id_admin = ? AND nome = ? AND email = ?';
    $arrayParam = array($_SESSION['id_admin'], $_SESSION['nome'], $_SESSION['email']);
    $usuarios = $dados->getSQLGeneric($sql_usuarios, $arrayParam, FALSE);
    if (!$usuarios) {
        session_start();
        session_destroy();
        header('Location: /'.$url->getComplemento());
    }
}
