<?php
function caminho(){
	//PEGA O CAMINHO E SEPARA EM UM ARRAY;
	$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$patch = explode("/", $rota['path']);
	//PEGO O ULTIMO ELEMENTO VALIDO DO ARRAY E VERIFICO SE ELE NÃO É UMA PASTA
	$file = end(array_filter ($patch));
	if(is_dir('../'.$file.'/') == true){
			$file = 'home';	
	};
	//CRIO OUTRO ARRAY COM TODOS OS ARQUIVOS LOCALIZADO NA PASTA PAGINAS,
	//PARA FACILITAR QUANDO ADICIONAR NOVAS PAGINAS
	
	$folder = 'paginas/';
	$scanDir = array_diff(scandir($folder), array('..', '.'));
	
	// COMPARO SE O ARQUIVO EXISTE NA PASTA PAGINAS;
	if(in_array($file.'.php',$scanDir)){
		return  'paginas/'.$file.'.php';
	}else{
		return  'paginas/'.'404.php';
	}
};


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once ('include/header.php'); ?>
</head>
<body>
<div id="tudo">
	<?php require_once ('include/topo.php'); ?>
    
    <?php include(caminho()); ?>
	
	<?php require_once ('include/footer.php'); ?>
</div>
</body>
</html>