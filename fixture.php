<?php
require_once "config/conexaoDB.php";

echo "### EXECUTANDO FIXTURE<br>";

$conn = conexaoDB();

echo "Remomendo tabela<br>";
$conn->query("DROP TABLE IF EXISTS fixture;");
echo " - OK<br>";


echo "Criando tabela<br>";
$conn->query("CREATE TABLE fixture (
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(45) CHARACTER SET 'utf8' NULL,
	PRIMARY KEY(id));");
echo " - OK\n";

echo "inserindo dados<br>";

for($x = 0; $x <=9; $x++){
	$nome = "fixture {$x}";
	$smt = $conn->prepare("INSERT INTO fixture(nome) VALUE(:nome);");
	$smt->bindParam(":nome",$nome);
	$smt->execute();
}

echo " - OK<br>";

echo "##### CONCLÚIDO ####";
?>