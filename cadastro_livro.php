<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	session_start();

	if(!isset($_SESSION['email'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');	

	$objDB = new db();
	$link = $objDB->conecta_mysql();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Livros</title>

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
	          	<li><a href="home.php">Home</a></li>
	          	<li><a href="lista_desejos.php">Lista de Desejos</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>



	<div class="container">  	
	    <div class="col-md-12 cadastro_livro" align="center">
	    	<form method="POST" action="registra_livro.php" enctype="multipart/form-data">
	    		<div class="form-group">
	    			<input type="text" class="form-control" name="nome_livro" placeholder="Nome do Livro" required="requiored">
		    		<br>
		    		<input type="text" class="form-control" name="autor" placeholder="Autor do Livro" required="requiored">
		    		<br>
		    		<input type="date" class="form-control" name="data_pub" placeholder="Data de Publicação" required="requiored">
		    		<br>
		    		<input type="text" class="form-control" name="qtde_pagina" placeholder="Quantidade de Páginas" required="requiored">
		    		<br>
		    		<input type="file" name="imagem">
		    		<input type="submit" name="submit" class="btn btn-primary" value="Cadastrar Livro">
	    		</div>
	    	</form>
	    </div>
	    <div class="col-md-12" align="center">
	    	<form method="POST" action="cadastro_livro.php">
	    		<div class="form-group">
		    		<label>Leitor de Código de barras: </label>
		    		<input type="text" name="documentID" onmouseover="this.focus();">
				</div>
	    	</form>
	    </div>
	</div>   

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>