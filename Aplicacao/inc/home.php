<div class="home h-vh d-flex align-items-center py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <h1>O jeito mais facil, rápido e seguro de contratar um serviço</h1>
                <h2>Selecione o tipo de serviço, receba 3 orçamentos diferentes e escolha o que mais lhe agrada</h2>
            </div>
        </div>
    </div>
</div>
<div class="home2 h-vh d-flex align-items-center py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-12 offset-md-1 offset-sm-0 text-center">
                <h1>O que é o Marido de Aluguel?</h1>
                <p>O Marido de Aluguel é a maior plataforma mais confiável de contratação de serviços on-line. Juntamos os profissionais de todo o Brasil com pessoas que precisam de serviços.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 text-center">
                <img src="/<?=$url->getComplemento()?>images/facil2.png" alt="Icone Facil" class="img-fluid my-3 icon">
                <h2>Fácil</h2>
                <p>Informe o tipo de serviço e solicite orçamento</p>
            </div>
            <div class="col-md-4 col-sm-12 text-center">
                <img src="/<?=$url->getComplemento()?>images/rapido2.png" alt="Icone Rapido" class="img-fluid my-3 icon">
                <h2>Rápido</h2>
                <p>Negocie diretamente com o prestador de serviço</p>
            </div>
            <div class="col-md-4 col-sm-12 text-center">
                <img src="/<?=$url->getComplemento()?>images/seguro2.png" alt="Icone Seguro" class="img-fluid my-3 icon">
                <h2>Seguro</h2>
                <p>Nós protegemos seu dinheiro até que o serviço seja concluído</p>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1>Teste agora nossa plataforma!</h1>
            </div>
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
        <div class="row py-5">
            <div class="col-md-6 col-sm-12">
                <div class="card shadow p-4 h-100">
                    <h1><span>Você</span> contrata?</h1>
                    <p>Diversos profissionais qualificados em todas as áreas, prontos para atender sua emergência. Cadastre-se e peça já seu orçamento!</p>
                    <button type="button" class="btn btn-tema mt-auto" data-toggle="modal" data-target="#modalContratante">
                        Cadastre-se
                    </button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card shadow p-4 h-100">
                    <h1><span>Você é</span> profissional?</h1>
                    <p>O Marido de Aluguel conta com mais de mil pedidos diariamente de clientes que necessitam de profissionais como você. Cadastre seus serviços e receba solicitações de orçamento diretamente do seu navegador.</p>
                    <button type="button" class="btn btn-tema mt-auto" data-toggle="modal" data-target="#modalContratado">
                        Cadastre-se
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>