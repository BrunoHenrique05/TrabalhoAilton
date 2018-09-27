<?php
// Inclui o arquivo de configuração
include('../login/config.php');

// Variavél para preencher o erro (se existir)
$erro = false;

// Apaga usuários
if ( isset( $_GET['del'] ) ) {
	// Delete de cara (sem confirmação)
	$pdo_insere = $conexao_pdo->prepare('DELETE FROM usuarios WHERE user_id=?');
	$pdo_insere->execute( array( (int)$_GET['del'] ) );
	
	// Redireciona para o index.php
	header('location: index.php');
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
			$pdo_insere = $conexao_pdo->prepare('UPDATE usuarios SET user=?, user_password=?, user_name=?, user_matricula =?, user_cpf =?, user_email =?, user_Telefone =?, user_celular, user_atuacoes =?  WHERE user_id=?');
			$pdo_insere->execute( array( $form_usuario,  crypt( $form_senha ), $form_nome, $user_id, $form_matricula, $form_cpf, $form_email, $form_telefone, $form_celular, $form_atuacoes ) );
			
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
		background-color: #111;
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

	
		
	
		
		<div align="center"><img style="height: 140px;  padding-right: 30px;" src="logo.png"></div>
		
	
		
	<ul>
		<li style="float:right"><a href="../login.php">Login</a></li>
		
	</ul>
	<!--FIM MENU-->

				
				

				
		
		
		<form action="" method="post">
			<div class="container">
			
			<br><br>

                        <div align="left"><b><h1>Cadastro de Sevidores</h1></b></div>
			<!--AQUI DEVE COLOCAR O BANCO DE DADOS-->
			<div class="form-group">
       
				
				<label for="nome">Usuario: </label> 
				<input type="nome" class="form-control" id="nome" placeholder="Usuario Login" name="form_usuario" required style="width: 570px;" required> 
				<br>
				<label for="nome">Senha: </label> 
				<input type="password" class="form-control" id="senha" placeholder="Senha" name="form_senha" required style="width: 570px;"> 
				<br>
				<label for="nome">Nome: </label> 
				<input type="nome" class="form-control" id="nome" placeholder="Nome Completo" name="form_nome" required style="width: 570px;"> 
				<br>
				<label for="matricula">Matrícula: </label> 
				<input type="text" class="form-control" id="matricula" placeholder="Nº da Matricula" name="form_matricula"required style="width: 570px;" align="right"> 
				<br>
				<label for="cpf">CPF: </label>
				<input type="text" class="form-control" id="cpf" placeholder="CPF" name="form_cpf" required style="width: 570px;">
				<br>
				<label for="email">Email: </label>
				<input type="text" class="form-control" id="email" placeholder="Email"  name="form_email"  required style="width: 570px;">
				<br>
				<label for="telefone">Telefone: </label>
				<input type="text" class="form-control" id="telefone" placeholder="Telefone" name="form_telefone"  required style="width: 570px;">
				<br>
				<label for="celular">Celular: </label>
				<input type="text" class="form-control" id="celular" placeholder="Celular" name="form_celular"required style="width: 570px;">
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
						<input class="form-check-input" type="radio" name="form_atuacoes" id="diretor" value="diretor" > Diretor
					</label>
					<br><br>
				
				<!--*********************************************************************************************************************-->
				<!--ENTRADA DE DADOS-->
				

				
				<?php if ( ! empty ( $erro ) ) :?>
					
						 style="color: red;"><?php echo $erro;?>
					
				<?php endif; ?>
				
				<div align="left" >
				<button style="width: 90px; color: #FFFFFF; background-color:#4CAF50; border: 1px black; " type="submit" class="btn btn-default" value="Cadastrar">Cadastrar</button>
				<div>
			</div>

				<?php 
		// Mostra os usuários
		$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios ORDER BY user_id DESC');
		$pdo_verifica->execute();
		?>
		
		<table border="1" cellpadding="4">
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Usuário</th>
			<th>Senha Criptografada</th>
		        <th>Matricula</th>
			<th>CPF</th>
			<th>E-mail</th>
			<th>Telefone</th>
			<th>Celular</th>
                        <th>Atuações</th>
		</tr>
		<?php
		while( $fetch = $pdo_verifica->fetch() ) {
			echo '<tr>';
			echo '<td>' . $fetch['user_id'] . '</td>';
			echo '<td>' . $fetch['user_name'] . '</td>';
			echo '<td>' . $fetch['user'] . '</td>';
			echo '<td>' . $fetch['user_password'] . '</td>';
			echo '<td>' . $fetch['user_matricula'] . '</td>';
			echo '<td>' . $fetch['user_cpf'] . '</td>';
			echo '<td>' . $fetch['user_email'] . '</td>';
			echo '<td>' . $fetch['user_Telefone'] . '</td>';
			echo '<td>' . $fetch['user_celular'] . '</td>';
			echo '<td>' . $fetch['user_atuacoes'] . '</td>';
			echo '<td> <a style="color:red;" href="?del=' . $fetch['user_id'] . '">Apagar</a> </td>';
			echo '</tr>';
		}

		?>
		</table>
		
		
	</body>
</html>
