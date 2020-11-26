<?php
require_once('../config/configuracao.php');

function admin()
{
    $arrayCond = array('id_admin=' => $_POST['id']);
    echo excluir($_POST['tabela'], $arrayCond);
    exit();
}

function contratado()
{
    $arrayCond = array('id_contratado=' => $_POST['id']);
    echo excluir($_POST['tabela'], $arrayCond);
    exit();
}

function servico()
{
    $arrayCond = array('id_servico=' => $_POST['id']);
    echo excluir($_POST['tabela'], $arrayCond);
    exit();
}

function excluir($tabela, $array)
{
    try {
        $crud = new dados($tabela);
        if ($crud->delete($array)) {
            return json_encode(
                array(
                    'codigo' => 1,
                    'mensagem' => 'Excluido com sucesso!'
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
