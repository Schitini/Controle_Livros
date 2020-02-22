<?php
	session_start();
	
	require_once('db.class.php');	

	error_reporting(E_ALL ^ E_DEPRECATED);
	

	if(!isset($_SESSION['email'])){
		header('location: index.php?erro=1');
	}

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	if(isset($_POST['submit'])){
		$nome_livro = $_POST['nome_livro'];
		$autor = $_POST['autor'];
		$data_pub = $_POST['data_pub'];
		$qtde_pagina = $_POST['qtde_pagina'];
		$imagem = $_FILES['imagem'];
		

		if($imagem != NULL) { 
		    $nomeFinal = time().'.jpg';
		    if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		        $tamanhoImg = filesize($nomeFinal); 
		 
		        $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 

				$sql = "INSERT INTO livro (nome,autor,data_pub,qtde_pagina,img) VALUES ('$nome_livro', '$autor', '$data_pub', '$qtde_pagina', '$mysqlImg')";

				if(mysqli_query($link,$sql)){
					unlink($nomeFinal);
					header('location: home.php');
				}
			}
		}
		else{
			echo "Erro ao cadastrar o livro!";
		}
	
	}

?>