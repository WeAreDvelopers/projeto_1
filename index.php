<?php
require_once "config/conexaoDB.php";
$conn = conexaoDB();
$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$patch = explode("/", $rota['path']);
$file = array_filter($patch);
$file = end($patch);

$url = $file;
if($url == ""){$url = "home";}

$sql = "Select titulo,conteudo from pg_conteudo where url = :url";
$stmt = $conn->prepare($sql);
$stmt->bindValue("url",$url);
$stmt->execute();
$cont = $stmt->rowCount();
$paginas = $stmt->fetch(PDO::FETCH_ASSOC);					
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once ('include/header.php'); ?>
</head>
<body>
<div id="tudo">
	<?php require_once ('include/topo.php'); ?>
    <header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $paginas['titulo']; ?></h1>
		</div>
	</header>
	<div class="container">
		<?php 
		if($url == "contato"){
			include('paginas/contato.php');
		}else{
			echo $paginas['conteudo']; 
		}
	 ?>
	</div>
	
	<?php require_once ('include/footer.php'); ?>
</div>
</body>
</html>