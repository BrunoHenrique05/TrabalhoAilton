
<?php
// Inclui o arquivo de configuração
include('login/config.php');

// Inclui o arquivo de verificação de login
include('login/verifica_login.php');


// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login
include('login/redirect.php');



?>

 Olá <b><?php echo $_SESSION['nome_usuario']
?>, <b><?php echo $_SESSION['atuacoes']
?></b> </b>,  você está conectado.


 <!DOCTYPE html>
<html>
<head>
	<title> Relatorios </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="imagens/icone.png">
	<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}

	li {
		float: left;
		border-right:1px solid #bbb;
	}

	li:last-child {
		border-right: none;
	}

	li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover:not(.active) {
		background-color:  #4CAF50;
	}

	.active {
		background-color: #4CAF50;
	}
	div{

		border: 1px  black;
		padding-top: 10px;
		padding-right: 30px;
		padding-bottom: 15px;
		padding-left: 0px;
	}

	
	td {
	width:200px;
	
	}





</style>
</head>
<body>
	<div align="left"> <img style="height: 140px; padding-right: 30px;" src="imagens/logo.png"></div>
	
		 <?php 
    $nivel = $_SESSION['atuacoes'];
    if($nivel == 'administrativo'){
	include('menuAdm.php');
	 $_SESSION['l']=4;
    }else  if($nivel == 'professor'){
 	include('menu.php');
	 }else  if($nivel == 'diretorEnsino'){
	 include('diretorEnsino.php');
	  $_SESSION['l']=1;
	 }else  if($nivel == 'diretorGeral'){
	 	$_SESSION['l']=2;
		include('diretorGeral.php');
	 }


    ?>

	<form method="POST" action="processa_cad_viagens.php">

        
		<br><br><br><br>
		<div class="container">

			
</form>
<?php
include('encerraSessao.php');
?>
</body>
</html>

