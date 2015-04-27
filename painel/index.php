<?php 
	session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login</title>
	
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/login.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.7.1.min.js"><\/script>')</script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
				$("#btSend").click(function(e) {
					e.preventDefault();
					$.post("library/verifica.php",$("#formLogin").serialize(),function(resposta){
							if(resposta == 1){
								window.location = "index1.php"
							}else{
								$(".resposta").html("Usuário e/ou Senha não inválido");
							};
					})
				});
		});
	</script>
</head>
<body>

	<div class="container">
		
		<form action="" class="form-login" id="formLogin">

			<h2>Login</h2>
			    <div class="form-group">
			    	<label>Login</label>
			        <input type="text" name="login" class="input-block-level" placeholder="login">
			    </div>
			    <div class="form-group">
			    	<label>Senha</label>
			        <input type="password" name="senha" class="input-block-level" placeholder="Senha">
			    </div>
			    
			    <div class="form-group">
			        <button class="btn btn-primary btn-lg btn-block" id="btSend">Sign In</button>		        
			    </div>
			    <div class="resposta" style="text-align:center"></div>
			</form>
		
	</div>
</body>
</html>