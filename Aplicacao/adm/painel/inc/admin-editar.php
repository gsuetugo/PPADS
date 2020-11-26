<?php
$sql_admin = 'SELECT id_admin, nome, email FROM admin WHERE id_admin = ?';
$arrayParam = array($_GET['editar']);
$admin = $crud_site->getSQLGeneric($sql_admin, $arrayParam, FALSE);
?>
<form name="admin" id="formEditar" method="post" ENCTYPE="multipart/form-data">
    <div class="row">
        <div class="form-group col-12">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" id="nome" name="nome" value="<?=$admin->nome?>" required>
        </div>
        <div class="form-group col-12">
            <label for="titulo">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="<?=$admin->email?>" required>
        </div>
        <div class="form-group col-12">
            <label for="senha">Senha</label>
            <input class="form-control" type="password" id="senha" name="senha">
        </div>
    </div>
    <input type="hidden" name="id_admin" id="id_admin" value="<?=$admin->id_admin?>">
    <div id="resposta"></div>
    <button name="btnSubmit" class="btn btn-primary">Salvar</button>
</form>