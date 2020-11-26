<?php
require_once('../config/configuracao.php');

function uploadImg($nome, $nomeTemp, $local)
{
    $extencao = strtolower(pathinfo($nome, PATHINFO_EXTENSION));
    $dimensoes = getimagesize($nomeTemp);

    if (!strstr('.jpg;.jpeg;.png', $extencao)) {
        echo json_encode(
            array(
                'codigo' => 0,
                'mensagem' => 'Formato de imagem inválido'
            )
        );
        exit();
    }

    if ($dimensoes[0] > 1920) {
        echo json_encode(
            array(
                'codigo' => 0,
                'mensagem' => 'A largura da imagem não deve ultrapassar 1920px'
            )
        );
        exit();
    }

    if ($dimensoes[1] > 1080) {
        echo json_encode(
            array(
                'codigo' => 0,
                'mensagem' => 'A altura da imagem não deve ultrapassar 1080px'
            )
        );
        exit();
    }

    $nomeNovo = md5(uniqid(time())).'.'.$extencao;
    move_uploaded_file($nomeTemp, '../../uploads/'.$local.$nomeNovo);
    return $nomeNovo;
}

function admin()
{
    if ($_POST['senha']) {
        $array = array(
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
        );
    } else {
        $array = array(
            'nome' => $_POST['nome'],
            'email' => $_POST['email']
        );
    }
    $arrayCond = array('id_admin=' => $_POST['id_admin']);
    echo editar($_POST['tabela'], $array, $arrayCond);
    exit();
}

function contratado()
{
    $array = array(
        'status' => $_POST['status']
    );
    $arrayCond = array('id_contratado=' => $_POST['id']);
    echo editar($_POST['tabela'], $array, $arrayCond);
    exit();
}

function servico()
{
    $array = array(
        'tipo_servico' => $_POST['tipo_servico'],
        'atributo_servico' => $_POST['atributo_servico']
    );
    $arrayCond = array('id_servico=' => $_POST['id_servico']);
    echo editar($_POST['tabela'], $array, $arrayCond);
    exit();
}

function editar($tabela, $array, $arrayCond)
{
    try {
        $crud = new dados($tabela);
        if ($crud->update($array, $arrayCond)) {
            return json_encode(
                array(
                    'codigo' => 1,
                    'mensagem' => 'Editado com sucesso!'
                )
            );
        }
    } catch (PDOException $e) {
        echo json_encode(
            array(
                'codigo' => 0,
                'mensagem' => 'Error: '.$e->getMessage()
            )
        );
        exit();
    }
}

if (!$_POST['tabela']()) {
    echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Ocorreu um erro, tente novamente mais tarde.'
        )
    );
    exit();
}
