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





<!DOCTYPE html>
<html>
	<head>
		
		
	<title> Editar Usuario </title>

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

		<form method="POST" action="editarUsuario1.php" enctype="multipart/form-data">		
				

			<?php  
				$t = $_POST['botao'];
				$_SESSION['botao']=$t;

				$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "cadastros";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
			$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios ORDER BY user_id DESC');
		$pdo_verifica->execute();
		
	while( $fetch = $pdo_verifica->fetch() ) {
			if($fetch['user_id']==$t){
				
		
			echo '		
					<div class="container">
			
			<br><br>

                        <div align="left"><b><h1>Edição do Sevidor</h1></b></div>
			<!--AQUI DEVE COLOCAR O BANCO DE DADOS-->
			<div class="form-group">
       
				
				<label for="nome">Usuario: </label> 
				<input type="nome" class="form-control" id="nome" placeholder="Usuario Login" value='.$fetch['user'].' name="form_usuario" required style="width: 750px;" required> 
				<br>
				';
				?>
				<label for="nome">Senha: </label> 
				<input type="password" class="form-control" id="senha" placeholder="Senha" name="form_senha"  required style="width: 750px;"> 
				<br>
				<?php 
				echo '
				<label for="nome">Nome: </label> 
				<input type="nome" class="form-control" id="nome" placeholder="Nome Completo" name="form_nome" value='.$fetch['user_name'].' required style="width: 750px;"> 
				<br>
				<label for="matricula">Matrícula: </label> 
				<input type="text" class="form-control" id="matricula" placeholder="Nº da Matricula" name="form_matricula" value='.$fetch['user_matricula'].'  required style="width: 750px;" align="right"> 
				<br>
				<label for="cpf">CPF: </label>
				<input type="text" class="form-control" id="cpf" value='.$fetch['user_cpf'].' placeholder="CPF" name="form_cpf" required style="width: 750px;">
				<br>
				<label for="email">Email: </label>
				<input type="text" class="form-control" id="email" placeholder="Email" value='.$fetch['user_email'].'  name="form_email"  required style="width: 750px;">
				<br>
				<label for="telefone">Telefone: </label>
				<input type="text" class="form-control" id="telefone" placeholder="Telefone" value='.$fetch['user_Telefone'].' name="form_telefone"  required style="width: 750px;">
				<br>
				<label for="celular">Celular: </label>
				<input type="text" class="form-control" id="celular" value='.$fetch['user_celular'].' placeholder="Celular" name="form_celular"required style="width: 750px;">
				<br>

				<!--*********************************************************************************************************************-->
				';
				?>
				<!--SERVIDOR-->
				<label>Atuação:</label>
				<div class="form-check form-check-inline" align="left">
					<label style="padding-right: 100px;" class="form-check-label" align="left">
						<input class="form-check-input" type="radio" name="form_atuacoes" id="professor" <?php echo ($fetch['user_atuacoes'] == "professor") ? "checked" : null; ?> value="professor"> Professor
					</label>

					<label style="padding-right: 100px;" class="form-check-label" >
						<input class="form-check-input" type="radio" name="form_atuacoes" <?php echo ($fetch['user_atuacoes'] == "administrativo") ? "checked" : null; ?>  id="administrativo"  value="administrativo"> Administrativo
					</label>
					<label style="padding-right: 100px;" class="form-check-label">
						<input class="form-check-input" type="radio" name="form_atuacoes" <?php echo ($fetch['user_atuacoes'] == "diretorEnsino") ? "checked" : null; ?> id="diretor" value="diretorEnsino" > Diretor de Ensino
					</label>
						<label style="padding-right: 100px;" class="form-check-label">
						<input class="form-check-input" type="radio" name="form_atuacoes" <?php echo ($fetch['user_atuacoes'] == "diretorGeral") ? "checked" : null; ?> id="diretor" value="diretorGeral" > Diretor Geral
					</label>
					<br><br>
		
			
				
				<br><br>
		
			

<?php
	
		}
		}
		


		
		
		include('encerraSessao.php');
		?>
		</table>
			
				<div align="left">
				<button style="width: 90px; color: #FFFFFF; background-color:red; border: 1px black;  " type="submit" name="botao" class="btn btn-default" value= <?php $t ?> >Editar</button>
				<div>
			</div>
		</form>
	</body>
</html>
