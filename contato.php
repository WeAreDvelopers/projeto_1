<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once ('include/header.php') ?>
</head>
<body>
<div id="tudo">
	<?php require_once ('include/topo.php') ?>
	<header class="jumbotron subhead">
		<div class="container">
			<h1>Contato</h1>
		</div>
	</header>
	<div class="container">

		<div class="span4">
			<form action="enviar.php" method="post">
			    <legend>Formulário de Contato</legend>
			    <label>Nome</label>
			    <input type="text" name="nome" placeholder="" class="input-block-level">
			    <label>Email</label>
			    <input type="text" name="email" placeholder="" class="input-block-level">
			    <label>Assunto</label>
			    <input type="text" name="assunto" placeholder="" class="input-block-level">
			    <label>Mensagem</label>
			    <textarea rows="3" class="input-block-level" name="mensagem"></textarea>
				<button type="submit" class="btn btn-large btn-block btn-success"> ENVIAR </button>
			</form>
		</div>
	</div>
	<?php require_once ('include/footer.php') ?>
</div>
</body>
</html>