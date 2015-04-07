<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="navbar-inner">
			<div class="container">
					<!-- .btn-nav-bar -->
					<button class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="home" class="brand">Site Simples em PHP</a>
					<!-- Tudo que for escondido a menos de 940px -->
					<div class="nav-collapse collapse">
						<ul class="nav">
							<?php
								$sql = "Select titulo,url from pg_conteudo";
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$links = $stmt->fetchAll(PDO::FETCH_ASSOC);
								foreach($links as $menu){
									echo "<li><a href=\"{$menu['url']}\">{$menu['titulo']}</a></li>";
								}
							?>
							
						</ul>
						
					</div>
					<div class="input-append navbar-search pull-right">
						<form class="form-group" id="form-pesquisa" action="busca.php" method="GET">
					 		<input class="span2" id="pesquisa" name="pesquisa" placeholder="Pesquisar..." type="text">
					  		<button class="btn " id="send" type="submit"><i class="icon-search"></i></button>
					  	</form>
					</div>
			</div>
		</div>
	</nav>