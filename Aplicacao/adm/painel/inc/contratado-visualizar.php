<?php
$sql_contratado = 'SELECT contratado.id_contratado, contratado.nome_contratado, contratado.email_contratado, contratado.data, contratado.cpf, endereco.cep, endereco.endereco, endereco.numero, endereco.complemento, endereco.bairro, endereco.cidade, estado.nome, telefone.telefone FROM contratado INNER JOIN endereco ON contratado.id_endereco = endereco.id_endereco INNER JOIN telefone ON contratado.id_telefone = telefone.id_telefone INNER JOIN estado ON endereco.id_estado = estado.id_estado WHERE id_contratado = ?';
$arrayParam = array($_GET['visualizar']);
$contratado = $crud_site->getSQLGeneric($sql_contratado, $arrayParam, FALSE);
?>
<p><b>Nome:</b> <?=$contratado->nome_contratado?></p>
<p><b>Email:</b> <?=$contratado->email_contratado?></p>
<p><b>Data de Nascimento:</b> <?=$contratado->data?></p>
<p><b>Endereco:</b> <?=$contratado->endereco?>, <?=$contratado->numero?>, <?=$contratado->complemento?></p>
<p><b>Bairro:</b> <?=$contratado->bairro?></p>
<p><b>Cidade:</b> <?=$contratado->cidade?></p>
<p><b>Estado:</b> <?=$contratado->nome?></p>
<p><b>Telefone:</b> <?=$contratado->telefone?></p>
<p><b>Serviços:</b></p>
<?php
$sql_servicos = 'SELECT tipo_servico FROM servico INNER JOIN contratado_servico ON servico.id_servico = contratado_servico.id_servico WHERE contratado_servico.id_contratado = ?';
$servicos = $crud_site->getSQLGeneric($sql_servicos, $arrayParam);
foreach ($servicos as $servico) { ?>
    <p><?=$servico->tipo_servico?></p>
<?php } ?>