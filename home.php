<?php
	session_start();

	if(!isset($_SESSION['email'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	
	$id_usuario = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>

	<!-- jquery - link cdn -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<link href="css/estilo.css" rel="stylesheet">

	<script type="text/javascript">
			
			$(document).ready(function(){			
					//carrega livros
					$.ajax({
						url: 'get_livro.php',
						success: function(data){
							$('#livros').html(data);

							//inclui livro no carrinho
							$('.btn_carrinho').click(function(){
								var id_livro = $(this).data('id_livro');
								
								$.ajax({
									url: 'inclui_lista.php',
									method: 'post',
									data: {id_lista: id_livro},
									success: function(data){
										alert('Livro adicionado ao seu carrinho com sucesso!');
									}
								});
							});
						}
					});
				
			});
		</script>
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
	          <ul class="nav navbar-nav navbar-right" >
	          	<li><a href="lista_desejos.php">Lista de Desejos</a></li>
	          	<li><a href="cadastro_livro.php">Cadastrar um novo livro</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

				
		
			<div class="col-md-12">
				<div id="livros" class="list-group">
				</div>
			</div>
	

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	

</body>
</html>