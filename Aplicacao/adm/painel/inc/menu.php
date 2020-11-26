<div class="mb-3">
	<?php if ($pg_acessada->getAtual() <> 'contratante') {?>
		<a href="?novo"class="btn btn-secondary">Novo</a>
	<?php }
	echo '<h2 class="mt-2">'.$pg_acessada->getTitulo().'</h2>';
	?>
</div>