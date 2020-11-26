<div class="table-responsive">
    <table name="contratado" id="tabela" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Visualizar</th>
                <th scope="col">Aprovar</th>
                <th scope="col">Reprovar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_contratados = 'SELECT id_contratado, nome_contratado, email_contratado FROM contratado WHERE status = 0';
            $contratados = $crud_site->getSQLGeneric($sql_contratados);
            foreach ($contratados as $contratado) {?>
                <tr>
                    <td><?=$contratado->nome_contratado?></td>
                    <td><?=$contratado->email_contratado?></td>
                    <td onclick="visualizar(<?=$contratado->id_contratado?>)" class="text-center"><i class="material-icons">list</i></td>
                    <td onclick="aprovar(<?=$contratado->id_contratado?>)" class="text-center"><i class="material-icons">done</i></td>
                    <td onclick="excluir(<?=$contratado->id_contratado?>)" class="text-center"><i class="material-icons">clear</i></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>