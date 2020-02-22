<?php

	$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>

	<!-- jquery - link cdn -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	<link href="css/estilo.css" rel="stylesheet">

</head>
<body>

	<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <h3 style="margin-top: 13.5px;">FIT</h3>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	          	<li><a href="index.php">Login</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	<div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-3"></div>
	    	<div class="col-md-6" align="center">
	    		<h3 style="color: #fff;">Cadastre-se.</h3>
	    		<br />
				<form method="post" action="registra_usuario.php" id="formCadastrarse">

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
						<?php
							if($erro_email){
								echo '<font style="color:#FF0000">Email já existe</font>';
							}
						?>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
					</div>
					
					<button type="submit" class="btn btn-primary form-control">Cadastrar</button>
				</form>
			</div>
	</div>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>