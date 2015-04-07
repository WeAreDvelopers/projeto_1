<?php
require_once "config/conexaoDB.php";
$conn = conexaoDB();

$pesquisa = $_GET['pesquisa'];

$sql = "Select * from pg_conteudo where conteudo like :keyword";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':keyword', "%".$pesquisa."%", PDO::PARAM_STR);
$stmt->execute();
$cont = $stmt->rowCount();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);					
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
			<h1>Pesquisa</h1>
		</div>
	</header>
	<div class="container">
		<p>Total de resultados entrontrados: <strong><?php echo $cont;?></strong></p>
		<ul class="list-resultado">
		<?php 
		foreach ($resultado as $key=>$val){
			$position = strripos($val['conteudo'], $pesquisa);


			echo '<li>';

			echo '<h3><a href="'.$val['url'].'">'.$val['titulo'].'</a></h3>';
			echo '....'.substr($val['conteudo'],$position-50,250) ."....";
			echo '</li>';
		}
	 ?>
	</ul>
		<div class="clear"></div>
	</div>
	
	<?php require_once ('include/footer.php'); ?>
</div>
</body>
</html>