<?php
include('config/class.php');
$url = new url();
$pg_acessada = new pg_acessada();
$crud = new dados();
$sql_estados = 'SELECT id_estado, uf FROM estado';
$estados = $crud->getSQLGeneric($sql_estados);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Gabriel Isacc, Giovanni Rodrigues, Gustavo Iquejiri, Marcelo Yamashita">
    <title>Marido de Aluguel</title>
    <!-- <link rel="icon" href="/<?=$url->getComplemento()?>adm/uploads/images/"> -->
    <link rel="stylesheet" type="text/css" href="/<?=$url->getComplemento()?>css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/<?=$url->getComplemento()?>css/custom.css">
</head>
<body>
    <?php require_once('inc/topo.php');?>
    <div class="principal">
        <?php require_once('inc/paginas.php');?>
    </div>
    <?php require_once('inc/rodape.php');?>

    <div class="modal fade" id="modalContratante" tabindex="-1" aria-labelledby="modalContratanteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalContratanteLabel">Cadastro Contratante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formContratante">
                        <div class="form-group">
                            <label for="nome">Nome completo:</label>
                            <input type="text" class="form-control" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="senha" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" name="cpf" required>
                        </div>
                        <div class="form-group">
                            <label for="data">Data de Nascimento:</label>
                            <input type="date" class="form-control" name="data" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" class="form-control" name="telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="cep">Cep:</label>
                            <input type="text" class="form-control" name="cep" required>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" name="endereco" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="numero">Número:</label>
                                <input type="text" class="form-control" name="numero" required>
                            </div>
                            <div class="form-group col">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" name="complemento">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-10">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" name="cidade" required>
                            </div>
                            <div class="form-group col-2">
                                <label for="uf">UF:</label>
                                <select class="custom-select" name="uf">
                                    <?php
                                    foreach ($estados as $estado) { ?>
                                        <option value="<?=$estado->id_estado?>"><?=$estado->uf?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <small id="respostacontratante"></small>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-tema">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalContratado" tabindex="-1" aria-labelledby="modalContratadoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalContratadoLabel">Cadastro Contratado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formContratado">
                        <div class="form-group">
                            <label for="nome">Nome completo:</label>
                            <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="senha">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" name="cpf">
                        </div>
                        <div class="form-group">
                            <label for="data">Data de Nascimento:</label>
                            <input type="date" class="form-control" name="data" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" class="form-control" name="telefone">
                        </div>
                        <div class="form-group">
                            <label for="cep">Cep:</label>
                            <input type="text" class="form-control" name="cep">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" name="endereco">
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="numero">Número:</label>
                                <input type="text" class="form-control" name="numero">
                            </div>
                            <div class="form-group col">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" name="complemento">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" name="bairro">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-10">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" name="cidade">
                            </div>
                            <div class="form-group col-2">
                                <label for="uf">UF:</label>
                                <select class="custom-select" name="uf">
                                    <?php
                                    foreach ($estados as $estado) { ?>
                                        <option value="<?=$estado->id_estado?>"><?=$estado->uf?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <h5>Serviços</h5>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo de serviço:</label>
                            <input type="text" class="form-control" name="tipo">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição do serviço</label>
                            <textarea class="form-control" name="descricao" rows="4"></textarea>
                        </div>
                        <small id="respostacontratado"></small>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-tema">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/<?=$url->getComplemento()?>js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/<?=$url->getComplemento()?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/<?=$url->getComplemento()?>js/custom.js"></script>
</body>
</html>