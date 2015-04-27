<?php 
session_start();
require_once "../../config/conexaoDB.php";
$conn = conexaoDB();

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "Select login,password from adm_user where login = :login";
$stmt = $conn->prepare($sql);
$stmt->bindValue("login",$login);
$stmt->execute();
$res = $stmt->fetch(PDO::FETCH_ASSOC);			

if(password_verify($senha, $res['password'])){
	$_SESSION['logado'] = 1;
	echo 1;
}else{
	$_SESSION['logado'] = 0;
	echo 0;
}
?>