<div class="mb-3">
	<?php if ($pg_acessada->getAtual() <> 'newsletter') {?>
		<a href="?novo"class="btn btn-secondary">Novo</a>
	<?php } ?>
	<?php if ($pg_acessada->getAtual() == 'menus') {?>
		<a href="?gerenciar"class="btn btn-secondary">Gerenciar</a>
	<?php }
	echo '<h2 class="mt-2">'.$pg_acessada->getTitulo().'</h2>';
	?>
</div>