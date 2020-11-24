<nav id="sidebar">
    <ul class="list-unstyled components">
        <p class="m-0 py-0"><small>Seja Bem-Vindo! </small></p>
        <p class="py-0"><?=$_SESSION['nome']?></p>
        <li class="<?php if ($pg_acessada->getAtual() == 'usuarios') {echo 'active';}?>">
            <a href="usuarios">Usuários</a>
        </li>
        <li>
            <a href="../logout.php">Sair</a>
        </li>
    </ul>
</nav>