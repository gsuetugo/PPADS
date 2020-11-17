<?php
include('../config/class.php');
$array = array(
    'telefone' => $_POST['telefone']
);
try {
    $crud = new dados('telefone');
    $id_telefone = $crud->insert($array, TRUE);
} catch (PDOException $e) {
    echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Error: '.$e->getMessage()
        )
    );
    exit();
}
$array = array(
    'id_estado' => $_POST['uf'],
    'cep' => $_POST['cep'],
    'endereco' => $_POST['endereco'],
    'numero' => $_POST['numero'],
    'complemento' => $_POST['complemento'],
    'bairro' => $_POST['bairro'],
    'cidade' => $_POST['cidade']
);
try {
    $crud = new dados('endereco');
    $id_endereco = $crud->insert($array, TRUE);
} catch (PDOException $e) {
    echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Error: '.$e->getMessage()
        )
    );
    exit();
}
$array = array(
    'id_endereco' => $id_endereco,
    'id_telefone' => $id_telefone,
    'nome_contratante' => $_POST['nome'],
    'email_contratante' => $_POST['email'],
    'senha_contratante' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
    'data' => $_POST['data'],
    'cpf' => $_POST['cpf']
);
try {
    $crud = new dados('contratante');
    if ($crud->insert($array)) {
        echo json_encode(
            array(
                'codigo' => 1,
                'mensagem' => 'Salvo com sucesso!'
            )
        );
        exit();
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