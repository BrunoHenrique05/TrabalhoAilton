
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
	<title> Aprovação </title>
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
		<form method="POST" action="aprovacao1.php">
	<div align="left"> <img style="height: 140px; padding-right: 30px;" src="imagens/logo.png"></div>
 <?php 
     $nivel = $_SESSION['atuacoes'];
    if($nivel == 'administrativo'){
	include('menuAdm.php');
	$_SESSION['l']=3;
    }else  if($nivel == 'professor'){
 	include('menu.php');
 	$_SESSION['l']=0;
	 }else  if($nivel == 'diretorEnsino'){
	 include('diretorEnsino.php');
	 $_SESSION['l']=1;
	 }else  if($nivel == 'diretorGeral'){
		include('diretorGeral.php');
		$_SESSION['l']=2;
	 }
    ?>


  
		<br><br><br><br>
		<div class="container">
			


<?php
$c=0;
	$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM cadastroviagem ORDER BY id DESC');
		$pdo_verifica->execute();
		
	while( $fetch = $pdo_verifica->fetch() ) {
			if($fetch['status']==$_SESSION['l']){
				
			$c=1;
			//echo '<h4><b> id: </b>' . $fetch['usuarios_user_id'] . '</h1><hr>';

			echo  '<h4><b> <input type="radio" name="botao" required value=" '. $fetch['id'] . '"  <b> Data de saida :</b> ' . $fetch['dataSaida'] . ' <b>Data de retorno :</b> ' . $fetch['dataRetorno']. '<b> Cidade de destino : </b>' . $fetch['cidadeDestino'] .'</h1>';

			$b=$fetch['id'];

			$_SESSION['a']=$fetch['usuarios_user_id'];
			$_SESSION['b']=$fetch['id'];
			//echo '<h4><b> Data de saida : </b>' . $fetch['dataSaida'] . '</h1><hr>';
			//echo '<h4><b> Data de retorno : </b>' . $fetch['dataRetorno'] . '</h1><hr>';

			 $a=$fetch['usuarios_user_id'];

	
		}
		}
		if ($c==1) {
		 echo '<button style="width: 180px; color: #FFFFFF; background-color:#4CAF50;; border: 1px black; " type="submit" class="btn btn-default" name="r" value="1" >Visualizar</button>';
		}else{
	
		}










?>


</form>

</body>
</html>

