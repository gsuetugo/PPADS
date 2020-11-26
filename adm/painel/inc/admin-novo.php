<form name="admin" id="formGravar" method="post" ENCTYPE="multipart/form-data">
    <div class="row">
        <div class="form-group col-12">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group col-12">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" required>
        </div>
        <div class="form-group col-12">
            <label for="senha">Senha</label>
            <input class="form-control" type="password" id="senha" name="senha" required>
        </div>
    </div>
    <div id="resposta"></div>
    <button name="btnSubmit" class="btn btn-primary">Salvar</button>
</form>