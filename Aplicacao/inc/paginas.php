<?php
if (file_exists('inc/' . $pg_acessada->getAtual($pg_acessada->getContagem() - 1) . '.php')) {
    include('inc/' . $pg_acessada->getAtual($pg_acessada->getContagem() - 1) . '.php');
} else {
    include('404.php');
}
