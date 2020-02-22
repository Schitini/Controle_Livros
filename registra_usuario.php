<?php
	
	require_once('db.class.php');

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$email_existe = false;


	//verificar se o email já existe
	$sql = " select * from usuarios where email = '$email' ";
	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){
			$email_existe = true;
		}
	}
	else{
		echo "Erro ao tentar localizar o registro de email";
	}

	if($email_existe){

		$retorno_get = '';

		if($email_existe){
			$retorno_get.= "erro_email=1&";
		}

		header('location: cadastro.php?'.$retorno_get);
		die();
	}



	$sql = " insert into usuarios(email, senha) values ('$email', '$senha')";

	//executar a query e validação dela
	if(mysqli_query($link, $sql)){
		header('location: index.php');
	}
	else{
		echo "Erro ao registrar o usuário!";
	}

?>