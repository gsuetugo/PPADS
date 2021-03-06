<?php
session_start();

require_once('config/configuracao.php');

$url = new url();

if (empty($_POST['email'])) {
    echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Preencha seu e-mail!'
        )
    );
    exit();
}
 
if (empty($_POST['senha'])) {
    echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Preencha sua senha!'
        )
    );
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo json_encode(array('codigo' => 0, 'mensagem' => 'Formato de e-mail inválido!'));
    exit();
}

$conexao = new conexao();

try {
    $sql = 'SELECT id_admin, nome, senha, email FROM admin WHERE email = :email LIMIT 1';
    $stmt = $conexao->getConn()->prepare($sql);
    $stmt->execute(array(
        'email' => $_POST['email']
    ));
    $retorno = $stmt->fetch(PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Error: '.$e->getMessage()
        )
    );
    exit();
}

if (!empty($retorno) && password_verify($_POST['senha'], $retorno->senha)) {
    $_SESSION['id_admin'] = $retorno->id_admin;
    $_SESSION['nome'] = $retorno->nome;
    $_SESSION['email'] = $retorno->email;
    $_SESSION['logado'] = 'SIM';
} else {
    $_SESSION['logado'] = 'NAO';
}

if ($_SESSION['logado'] == 'SIM') {
    echo json_encode(
        array(
            'codigo' => 1,
            'mensagem' => 'Logado com sucesso!'
        )
    );
    exit();
} else {
    echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Usuário ou senha incorreta'
        )
    );
    exit();
}
