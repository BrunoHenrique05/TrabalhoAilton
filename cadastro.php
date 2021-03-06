<?php
// Inclui o arquivo de configuração
include('login/config.php');

// Inclui o arquivo de verificação de login
include('login/verifica_login.php');


// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login
include('login/redirect.php');


// Inclui o arquivo de configuração
?>

 Olá <b><?php echo $_SESSION['nome_usuario']
?>, <b><?php echo $_SESSION['atuacoes']
?></b> </b>,  você está conectado.



<?php

// Variavél para preencher o erro (se existir)
$erro = false;
$r = false;
// Apaga usuários
if ( isset( $_GET['del'] ) ) {
	// Delete de cara (sem confirmação)
	$pdo_insere = $conexao_pdo->prepare('DELETE FROM usuarios WHERE user_id=?');
	$pdo_insere->execute( array( (int)$_GET['del'] ) );
	
	// Redireciona para o index.php
	header('location: cadastro.php');
}

// Verifica se algo foi postado para publicar ou editar
if ( isset( $_POST ) && ! empty( $_POST ) ) {
	// Cria as variáveis
	foreach ( $_POST as $chave => $valor ) {
		$$chave = $valor;
		

		// Verifica se existe algum campo em branco
               
		if ( empty ( $valor ) ) {
			// Preenche o erro
			$erro = 'Existem campos em branco.';
		}
	}


	
	// Verifica se as variáveis foram configuradas
	/*
	if ( empty( $form_usuario ) || empty ( $form_senha ) || empty( $form_nome ) || ( $form_matricula ) || empty( $form_cpf ) || empty( $form_email)|| ( $form_telefone ) || empty( $form_celular ) || empty( $form_atuacoes) ) {
		$erro = 'Existem campos em branco.'; }*/
	
	// Verifica se o usuário existe
	$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios WHERE user = ?');
	$pdo_verifica->execute( array( $form_usuario ) );
	
	// Captura os dados da linha
	$user_id = $pdo_verifica->fetch();
	$user_id = $user_id['user_id'];
	
	// Verifica se tem algum erro
	if ( ! $erro ) {
		// Se o usuário existir, atualiza
		if ( ! empty( $user_id ) ) {
			/*
			$pdo_insere = $conexao_pdo->prepare('UPDATE usuarios SET user=?, user_password=?, user_name=?, user_matricula =?, user_cpf =?, user_email =?, user_Telefone =?, user_celular, user_atuacoes =?  WHERE user_id=?');
			$pdo_insere->execute( array( $form_usuario,  crypt( $form_senha ), $form_nome, $user_id, $form_matricula, $form_cpf, $form_email, $form_telefone, $form_celular, $form_atuacoes ) );*/
			$r = "<span style='color:red;'>Usuario ja existe</span>";

			
		// Se o usuário não existir, cadastra novo
		} else {
			$pdo_insere = $conexao_pdo->prepare('INSERT INTO usuarios (user, user_password, user_name, user_matricula, user_cpf, user_email, user_Telefone, user_celular, user_atuacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$pdo_insere->execute( array( $form_usuario, crypt( $form_senha ), $form_nome, $form_matricula, $form_cpf, $form_email, $form_telefone, $form_celular, $form_atuacoes  ) );

			    
		}
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
		
		
	<title> Cadastrar Servidor </title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="shortcut icon" href="imagens/icone.png">

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
	</style>
	</head>
	
	<body>

	
		
	
		
		
		
		<div align="left"> <img style="height: 140px; padding-right: 30px;" src="imagens/logo.png"></div>
		
 	 <?php 
    $nivel = $_SESSION['atuacoes'];
    if($nivel == 'administrativo'){
	include('menuAdm.php');
    }else  if($nivel == 'professor'){
 	include('menu.php');
	 }else  if($nivel == 'diretorEnsino'){
	 include('diretorEnsino.php');
	 }else  if($nivel == 'diretorGeral'){
		include('diretorGeral.php');
	 }


    ?>
    
	<!--FIM MENU-->

				
				

				
		
		
		<form action="" method="post">
			<div class="container">
			
			<br><br>

                        <div align="left"><b><h1>Cadastro de Sevidores</h1></b></div>
			<!--AQUI DEVE COLOCAR O BANCO DE DADOS-->
			<div class="form-group">
       
				
				<label for="nome">Usuario: </label> 
				<input type="nome" class="form-control" id="nome" placeholder="Usuario Login" name="form_usuario" required style="width: 750px;" required> 
				<br>
				<label for="nome">Senha: </label> 
				<input type="password" class="form-control" id="senha" placeholder="Senha" name="form_senha" required style="width: 750px;"> 
				<br>
				<label for="nome">Nome: </label> 
				<input type="nome" class="form-control" id="nome" placeholder="Nome Completo" name="form_nome" required style="width: 750px;"> 
				<br>
				<label for="matricula">Matrícula: </label> 
				<input type="text" class="form-control" id="matricula" placeholder="Nº da Matricula" name="form_matricula"required style="width: 750px;" align="right"> 
				<br>
				<label for="cpf">CPF: </label>
				<input type="text" class="form-control" id="cpf" placeholder="CPF" name="form_cpf" required style="width: 750px;">
				<br>
				<label for="email">Email: </label>
				<input type="text" class="form-control" id="email" placeholder="Email"  name="form_email"  required style="width: 750px;">
				<br>
				<label for="telefone">Telefone: </label>
				<input type="text" class="form-control" id="telefone" placeholder="Telefone" name="form_telefone"  required style="width: 750px;">
				<br>
				<label for="celular">Celular: </label>
				<input type="text" class="form-control" id="celular" placeholder="Celular" name="form_celular"required style="width: 750px;">
				<br>

				<!--*********************************************************************************************************************-->
				<!--SERVIDOR-->
				<label>Atuação:</label>
				<div class="form-check form-check-inline" align="left">
					<label style="padding-right: 100px;" class="form-check-label" align="left">
						<input class="form-check-input" type="radio" name="form_atuacoes" id="professor" value="professor"> Professor
					</label>

					<label style="padding-right: 100px;" class="form-check-label" >
						<input class="form-check-input" type="radio" name="form_atuacoes" id="administrativo" value="administrativo"> Administrativo
					</label>
					<label style="padding-right: 100px;" class="form-check-label">
						<input class="form-check-input" type="radio" name="form_atuacoes" id="diretor" value="diretorEnsino" > Diretor de Ensino
					</label>
						<label style="padding-right: 100px;" class="form-check-label">
						<input class="form-check-input" type="radio" name="form_atuacoes" id="diretor" value="diretorGeral" > Diretor Geral
					</label>
					<br><br>
				
				<!--*********************************************************************************************************************-->
				<!--ENTRADA DE DADOS-->
				

				
				<?php if ( ! empty ( $erro ) ) :?>


					
						 style="color: red;"><?php echo $erro;?>
					
				<?php endif; ?>

				<?php  
				if ( ! empty ( $r ) ):?>
   				<?php echo $r;?>
				<?php endif; ?>
				
				<br><br>
				<div align="left">
				<button style="width: 90px; color: #FFFFFF; background-color:#4CAF50; border: 1px black; " type="submit" class="btn btn-default" value="Cadastrar">Cadastrar</button>
				<div>
			</div>
			</div>
		</form>

				<?php 
		// Mostra os usuários
		$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios ORDER BY user_id DESC');
		$pdo_verifica->execute();
		?>
		<br>
		<table border="1" cellpadding="4">
		<tr>
			
			<th>Nome </th>
			<th>Usuário </th>
			
		        <th>Matricula </th>
			<th>CPF </th>
			<th>E-mail </th>
			<th> Telefone </th>
			<th> Celular </th>
                        <th>Atuações </th>
		</tr>
		<form method="POST" action="editarUsuario.php">
			<h4><b>  Servidores Cadastrados <b></h4>
		<?php
	
		

		while( $fetch = $pdo_verifica->fetch() ) {
			echo '<tr>';
			
			

						echo '<td>' . $fetch['user_name'] . '</td>';
			echo '<td>' . $fetch['user'] . '</td>';
		
			echo '<td>' . $fetch['user_matricula'] . '</td>';
			echo '<td>' . $fetch['user_cpf'] . '</td>';
			echo '<td>' . $fetch['user_email'] . '</td>';
			echo '<td>' . $fetch['user_Telefone'] . '</td>';
			echo '<td>' . $fetch['user_celular'] . '</td>';
			echo '<td>' . $fetch['user_atuacoes'] . '</td>';
			echo '<td> <button style="width: 60px; color: #FFFFFF; background-color:red; border: 1px black; " type="submit" class="btn btn-default" name="botao" value='.$fetch['user_id'].'  >Editar</button> </td>';
		}

		?>
		</table>
		<?php
		include('encerraSessao.php');
		?>
		</form>
	</body>
</html>
