<?php
  
  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
  

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Controle de Livros</title>
	<!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <link href="css/estilo.css" rel="stylesheet">

    <script>
      $(document).ready(function(){
        $('#btn_login').click(function(){

          var campo_vazio = false;

          if ($('#campo_email').val() == ''){
            $('#campo_email').css({'border-color':' #A94442'});
            campo_vazio = true;
          }
          else{
            $('#campo_email').css({'border-color':' #CCC'});
          }
          if($('#campo_senha').val() == ''){
            $('#campo_senha').css({'border-color':' #A94442'});
            campo_vazio = true;
          }
          else{
            $('#campo_senha').css({'border-color':' #CCC'});
          }

          if (campo_vazio) return false;

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
            <ul class="nav navbar-nav navbar-right">
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
   			<div class="col-md-6" align="center">
   				<h3 align="center" style="margin-bottom: 40px; margin-top: 80px; color: #fff;">Login</h3>
   				<form method="post" action="validar_acesso.php" id="formLogin">
   					<div class="form-group">
   						<input type="email" class="form-control" id="campo_email" name="email" placeholder="Email">
   					</div>

   					<div class="form-group form-senha">
   						<input type="password" class="form-control" id="campo_senha" name="senha" placeholder="Senha">
   					</div>
   					
   					<button type="submit" class="btn btn-primary form-control" id="btn_login" style="margin-bottom: 10px;">Entrar</button>
   					
   					<a href="cadastro.php" class="btn btn-default form-control">Cadastrar-se</a>

          </form>
          	<?php
                if($erro == 1){
                  echo '<font color="#F6CECE">E-mail e/ou senha inválidos(s)!</font>';
                }
          	?>  
			</div>
		</div>

	</div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>