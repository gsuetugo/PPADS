<div class="table-responsive">
    <table name="admin" id="tabela" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_admins = 'SELECT id_admin, nome, email FROM admin';
            $admins = $crud_site->getSQLGeneric($sql_admins);
            foreach ($admins as $admin) {?>
                <tr>
                    <td><?=$admin->nome?></td>
                    <td><?=$admin->email?></td>
                    <td onclick="editar(<?=$admin->id_admin?>)" class="text-center"><i class="material-icons">edit</i></td>
                    <td onclick="excluir(<?=$admin->id_admin?>)" class="text-center"><i class="material-icons">delete</i></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>