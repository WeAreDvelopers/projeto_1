<?php 
session_start();
require_once "../../config/conexaoDB.php";
$conn = conexaoDB();

$id = $_POST['id'];

$titulo = $_POST['titulo'];
$url = limpaUrl($titulo);
$conteudo = $_POST['editor1'];

		$smt = $conn->prepare("UPDATE pg_conteudo SET titulo=:titulo, url=:url, conteudo=:conteudo WHERE id=:id");
		$smt->bindParam(":id",$id);
		$smt->bindParam(":titulo",$titulo);
		$smt->bindParam(":url",$url);
		$smt->bindParam(":conteudo",$conteudo);
		$ok = $smt->execute();
		if($ok){
			echo 1;

		}else{
			echo 0;
		};

function limpaUrl($str){
		$str = strtolower(utf8_decode($str)); $i=1;
		$str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
		$str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
		while($i>0) $str = str_replace('--','-',$str,$i);
		if (substr($str, -1) == '-') $str = substr($str, 0, -1);
		return $str;
}
 ?>