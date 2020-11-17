<?
include('../config/class.php');
$crud_site = new dados();
$sql_config = 'SELECT configuracao.titulo, configuracao.email FROM configuracao';
$config_site = $crud_site->getSQLGeneric($sql_config, $array_parram, FALSE);
$data = date('d/m/Y');
$hora = date('H\hi');      
$emailsender = 'noreply@'.$_SERVER[HTTP_HOST];
if (PATH_SEPARATOR == ';') {
	$quebra_linha = "\r\n";
} else {
	$quebra_linha = "\n";
}
$emaildestinatario = $config_site->email;
$nomeremetente = $_SERVER['SERVER_NAME'];
$emailremetente = 'noreply@'.$_SERVER['SERVER_NAME'];
$assunto = 'Contato '.$config_site->titulo.' via site';
$mensagemHTML = 'Contato realizado no dia: '.$data.' - '.$hora.
	'<p>O usuário <b>' .$_POST['nome'] .'</b>, entrou em contato conosco</p>'.
	'<b>Nome:</b> '.$_POST['nome'].'<br>'.
	'<b>Telefone:</b> '.$_POST['telefone'].'<br>'.
	'<b>E-mail:</b> '.$_POST['email'].'<br>'.
	'<b>mensagem:</b> '.$_POST['mensagem'].'<br>';
$headers = 'MIME-Version: 1.1'.$quebra_linha;
$headers .= 'Content-type: text/html; charset=iso-8859-1'.$quebra_linha;
$headers .= 'From: '.$emailsender.$quebra_linha;
if (!mail($emaildestinatario, $assunto, $mensagemHTML, $headers ,'-r'.$emailsender)) {
	$headers .= 'Return-Path: '.$emailsender.$quebra_linha;
	mail($emaildestinatario, $assunto, $mensagemHTML, $headers );
	echo json_encode(
        array(
            'codigo' => 0,
            'mensagem' => 'Ocorreu um erro, tente novamente mais tarde!'
        )
    );
    exit();
} else {
	echo json_encode(
        array(
            'codigo' => 1,
            'mensagem' => 'Obrigado pelo contato! Sua mensagem foi enviada com sucesso.'
        )
    );
}
