<?php
require_once('config/configuracao.php');

$url = new url();

session_start();
session_destroy();
header('Location: /'.$url->getComplemento());
