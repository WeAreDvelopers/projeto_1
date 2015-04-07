<?php
function conexaoDB(){

	try{
		$config = include "config.php"; 
		if(!isset($config['db'])){
			throw new \InvalidArgumentExeption ("Configuração do banco de dados não existe");
		};	
		$host = (isset($config['db']['host']))?$config['db']['host']:null;
		$dbname = (isset($config['db']['db_name']))?$config['db']['db_name']:null;
		$user = (isset($config['db']['user']))?$config['db']['user']:null;
		$password = (isset($config['db']['password']))?$config['db']['password']:null;
		
		return new PDO("mysql:host={$host};dbname={$dbname};port=3305",$user,$password);
		
		
	}
	catch (\PDOExeption $e){
			echo $e->getMessage() . "<br>";
			echo $e->getTraceAsString() . "<br>";

	}
}
function fixture(){
	$conn = conexaoDB();
	$table = "fixture";
	
	//Removendo tabela se existe;
	$conn->query("DROP TABLE IF EXISTS {$table};");
	
	//Criando tabela
	$conn->query("CREATE TABLE {$table} (
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(45) CHARACTER SET 'utf8' NULL,
	PRIMARY KEY(id));");
	
	//Inserindo dados de Teste
	for($i = 1; $i<=10;$i++){
		$nome = "DADOS DE TESTE {$i}";
		$smt = $conn->prepare("INSERT INTO {$table}(nome) VALUE (:nome);");
		$smt->bindParam(":nome",$nome);
		$smt->execute();

	}
};
fixture();
?>