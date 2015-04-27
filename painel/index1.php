<?php 
	session_start();

	if(isset($_SESSION['logado']) and $_SESSION['logado'] == 1){
		
	require_once "../config/conexaoDB.php";
	$conn = conexaoDB();

	$sql = "Select * from pg_conteudo";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);		
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
</head>
<body>
	<div class="container-fluid">
		<div class="logout">
			<a href="logout.php" class="btn btn-mini"><i class="icon-off"></i> Logout</a>
		</div>
		<div class="tabela-paginas">
		<table class="table table-hover ">
						<h2>Páginas</h2>
						<thead>
							<tr class="success">
								<th width="10%">#</th>
								<th>Descrição</th>
								<th width="20%"></th>
							</tr>
						</thead>
						<tbady>
							<?php 
							foreach ($resultado as $key=>$val){
							?>
							<tr>
								<td><?php echo $val['id'];?></td>
								<td><?php echo $val['titulo'];?></td>
								<td><a href="editar-pagina.php?id=<?php echo $val['id'];?>" class="btn btn-mini btn-primary">Editar</a></td>
							</tr>
							<?php } ?>
						</tbady>
					</table>
					</div>
					</div>
</body>
</html>