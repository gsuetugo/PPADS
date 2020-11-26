<nav id="sidebar">
    <ul class="list-unstyled components">
        <p class="m-0 py-0"><small>Seja Bem-Vindo! </small></p>
        <p class="py-0"><?=$_SESSION['nome']?></p>
        <li class="<?php if ($pg_acessada->getAtual() == 'admin') {echo 'active';}?>">
            <a href="admin">Administradores</a>
        </li>
        <li class="<?php if ($pg_acessada->getAtual() == 'contratado') {echo 'active';}?>">
            <a href="contratado">Análise de Contratados</a>
        </li>
        <li class="<?php if ($pg_acessada->getAtual() == 'servico') {echo 'active';}?>">
            <a href="servico">Servicos</a>
        </li>
        <li>
            <a href="../logout.php">Sair</a>
        </li>
    </ul>
</nav>