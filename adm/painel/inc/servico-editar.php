<?php
$sql_servico = 'SELECT id_servico, tipo_servico, atributo_servico FROM servico WHERE id_servico = ?';
$arrayParam = array($_GET['editar']);
$servico = $crud_site->getSQLGeneric($sql_servico, $arrayParam, FALSE);
?>
<form name="servico" id="formEditar" method="post" ENCTYPE="multipart/form-data">
    <div class="row">
        <div class="form-group col-12">
            <label for="tipo_servico">Titulo</label>
            <input class="form-control" type="text" id="tipo_servico" name="tipo_servico" value="<?=$servico->tipo_servico?>" required>
        </div>
        <div class="form-group col-12">
            <label for="atributo_servico">Atributo</label>
            <input class="form-control" type="text" id="atributo_servico" name="atributo_servico" value="<?=$servico->atributo_servico?>" required>
        </div>
    </div>
    <input type="hidden" name="id_servico" id="id_servico" value="<?=$servico->id_servico?>">
    <div id="resposta"></div>
    <button name="btnSubmit" class="btn btn-primary">Salvar</button>
</form>