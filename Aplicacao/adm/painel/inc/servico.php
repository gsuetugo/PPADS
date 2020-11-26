<div class="table-responsive">
    <table name="servico" id="tabela" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Atributo</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_servicos = 'SELECT id_servico, tipo_servico, atributo_servico FROM servico';
            $servicos = $crud_site->getSQLGeneric($sql_servicos);
            foreach ($servicos as $servico) {?>
                <tr>
                    <td><?=$servico->tipo_servico?></td>
                    <td><?=$servico->atributo_servico?></td>
                    <td onclick="editar(<?=$servico->id_servico?>)" class="text-center"><i class="material-icons">edit</i></td>
                    <td onclick="excluir(<?=$servico->id_servico?>)" class="text-center"><i class="material-icons">delete</i></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>