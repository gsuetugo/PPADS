<form name="servico" id="formGravar" method="post" ENCTYPE="multipart/form-data">
    <div class="row">
        <div class="form-group col-12">
            <label for="tipo_servico">Titulo</label>
            <input class="form-control" type="text" id="tipo_servico" name="tipo_servico" required>
        </div>
        <div class="form-group col-12">
            <label for="atributo_servico">Atributo</label>
            <input class="form-control" type="text" id="atributo_servico"  name="atributo_servico" required>
        </div>
    </div>
    <div id="resposta"></div>
    <button name="btnSubmit" class="btn btn-primary">Salvar</button>
</form>