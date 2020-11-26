<?php
session_start();

require_once('config/class.php');

$url = new url();

if (isset($_SERVER['HTTP_REFERER'])
    && $_SERVER['HTTP_REFERER'] <> $url->getProtocolo().$_SERVER['SERVER_NAME'].'/'.$url->getComplemento()
    && $_SERVER['HTTP_REFERER'] <> $url->getProtocolo().$_SERVER['SERVER_NAME'].'/'.$url->getComplemento().'index.php') {
    echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Origem da requisição não autorizada!'
        )
    );
    exit();
}

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

if ($_POST['tipo'] == 'contratante') {
    try {
        $sql = 'SELECT id_contratante, nome_contratante, senha_contratante, email_contratante FROM contratante WHERE email_contratante = :email LIMIT 1';
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

    if (!empty($retorno) && password_verify($_POST['senha'], $retorno->senha_contratado)) {
        $_SESSION['id_contratante'] = $retorno->id_contratante;
        $_SESSION['nome_contratante'] = $retorno->nome_contratante;
        $_SESSION['email_contratante'] = $retorno->email_contratante;
        $_SESSION['logado_contratante'] = 'SIM';
    } else {
        $_SESSION['logado_contratante'] = 'NAO';
    }

    if ($_SESSION['logado_contratante'] == 'SIM') {
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
} else {
    try {
        $sql = 'SELECT id_contratado, nome_contratado, senha_contratado, email_contratado FROM contratado WHERE email_contratado = :email LIMIT 1';
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

    if (!empty($retorno) && password_verify($_POST['senha'], $retorno->senha_contratado)) {
        $_SESSION['id_contratado'] = $retorno->id_contratado;
        $_SESSION['nome_contratado'] = $retorno->nome_contratado;
        $_SESSION['email_contratado'] = $retorno->email_contratado;
        $_SESSION['logado_contratado'] = 'SIM';
    } else {
        $_SESSION['logado_contratado'] = 'NAO';
    }

    if ($_SESSION['logado_contratado'] == 'SIM') {
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
}
