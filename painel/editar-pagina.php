<?php 
	session_start();
	if(isset($_SESSION['logado']) and $_SESSION['logado'] == 1){
	require_once "../config/conexaoDB.php";
	$conn = conexaoDB();
	$id = $_GET['id'];
	$sql = "Select * from pg_conteudo where id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue("id",$id);
	$stmt->execute();
	$cont = $stmt->rowCount();
	$conteudo = $stmt->fetch(PDO::FETCH_ASSOC);	

	}else{
	header("Location: index.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Lista de Páginas</title>
	
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/estilo.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.7.1.min.js"><\/script>')</script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script src="library/ckeditor/ckeditor.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
				$("#btSend").click(function(e) {
					e.preventDefault();
					for (instance in CKEDITOR.instances) {
		                CKEDITOR.instances[instance].updateElement();
		            }
					$.post("library/update_pg.php",$("#formConteudo").serialize(),function(resposta){
						console.log(resposta);
						if(resposta == 1){
							window.location.reload();

						}
					})
				});
		});
	</script>
</head>
<body>

	<div class="container-fluid">
		<div class="logout">
			<a href="logout.php" class="btn btn-mini"><i class="icon-off"></i> Logout</a>
		</div>
		<div class="tabela-paginas">
			<form action="" method="post" id="formConteudo">
				<input type="hidden" value="<?php echo $conteudo['id'] ?>" name="id">
			    <legend>Edição de Conteúdo <a href="index1.php" class="btn btn-mini right  pull-right" type="button">Fechar</a></legend>
			    <label>Título</label>
			    <input type="text" name="titulo" placeholder="" class="input-block-level" value="<?php echo $conteudo['titulo'] ?>">
			    <label>Url (opcional)</label>
			    <input type="text" name="url" value="<?php echo $conteudo['url'] ?>" placeholder="" class="input-block-level">
			    <label>Conteúdo</label>
			   
			    <textarea rows="3" class="input-block-level" class="ckeditor" name="editor1">
			    	<?php echo $conteudo['conteudo'] ?>
			    </textarea>

			    <div class="row-fluid" style="margin-top:15px;">
				 
				  <div class="span3 pull-right"><button type="submit" class="btn btn-block btn-success" id="btSend"> Atualizar </button></div>
				</div>
				
			</form>
		</div>
		</div>
		<script>
	


CKEDITOR.replace('editor1');
	</script>
</body>
</html>