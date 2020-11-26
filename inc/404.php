<?php
header("HTTP/1.0 404 Not Found");
header("Status: 404 Not Found");
?>
<div class="container my-auto text-center">
    <h1>ERRO 404</h1>
    <h2>Página não encontrada</h2>
    <p>Pedimos desculpas, mas a página que você solicitou não está dispinível. Por favor, volte para a página inicial</p>
    <a href="/<?=$url->getComplemento()?>" class="btn btn-tema">Voltar a página inicial</a>
</div>