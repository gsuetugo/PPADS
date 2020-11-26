<div class="container py-5">
    <div class="row">
        <div class="col-12 mt-3">
            <form action="catalogo" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" name="busca" placeholder="Pesquise o serviço desejado" required>
                    <div class="input-group-append">
                        <button class="btn btn-tema" type="submit"><i class="material-icons text-white">search</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container pb-5">
    <div class="row">
        <?php
        $sql_servicos = 'SELECT id_servico, tipo_servico, atributo_servico FROM servico';
        $servicos = $crud->getSQLGeneric($sql_servicos);
        foreach ($servicos as $servico) { ?>
            <div class="col-md-4 col-sm-12 my-3">
                <div class="h-100 p-3 card shadow text-center">
                    <h2 class="mb-4"><?=$servico->tipo_servico?></h2>
                    <button type="button" class="btn btn-tema mt-auto" data-toggle="modal" data-target="#modalOrcamento" onclick="categoria(<?=$servico->id_servico?>, '<?=$servico->atributo_servico?>')">
                        Solicite Orçamento
                    </button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>