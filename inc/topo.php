<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-0">
        <div class="w-100 d-flex flex-wrap">
            <div class="col-12 shadow">
                <div class="container py-1 d-flex justify-content-between">

                    <a class="navbar-brand" href="/<?=$url->getComplemento()?>">
                        <img src="/<?=$url->getComplemento()?>images/logo2.png" class="img-fluid logo" alt="logo">
                    </a>

                    <div class="d-none d-sm-none d-md-none d-lg-block">
                        <?php
                        if ($_SESSION['logado_contratado']) { ?>
                            <p class="text-white">Seja Bem-Vindo <?=$_SESSION['nome_contratado']?></p>
                            <a href="" onclick="sair()">Sair</a>
                        <?php } elseif ($_SESSION['logado_contratante']) { ?>
                            <p class="text-white">Seja Bem-Vindo <?=$_SESSION['nome_contratante']?></p>
                            <a href="" onclick="sair()">Sair</a>
                        <?php } else { ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-tema" data-toggle="modal" data-target="#modalLogin">Entrar</button>
                            </div>
                        <?php } ?>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
            </div>
            <div class="collapse navbar-collapse col-12 py-3" id="navbarTogglerDemo03">
                <div class="container">
                    <ul class="navbar-nav w-100 d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link <?=$pg_acessada->getAtual($pg_acessada->getContagem() - 1) == 'home' ? 'active' : ''?>" href="/<?=$url->getComplemento()?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$pg_acessada->getAtual($pg_acessada->getContagem() - 1) == 'catalogo' ? 'active' : ''?>" href="/<?=$url->getComplemento()?>catalogo">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$pg_acessada->getAtual($pg_acessada->getContagem() - 1) == 'contratante' ? 'active' : ''?>" href="/<?=$url->getComplemento()?>">Para Contratante</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$pg_acessada->getAtual($pg_acessada->getContagem() - 1) == 'contratado' ? 'active' : ''?>" href="/<?=$url->getComplemento()?>">Para Contratado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$pg_acessada->getAtual($pg_acessada->getContagem() - 1) == 'contato' ? 'active' : ''?>" href="/<?=$url->getComplemento()?>">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>