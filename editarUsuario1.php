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

				
				

			<?php  
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "cadastros";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}

$form_usuario=$_POST['form_usuario'];
$form_senha=$_POST['form_senha'];
$form_senha=crypt($form_senha);
$form_nome=$_POST['form_nome'];
$form_matricula=$_POST['form_matricula'];
$form_cpf=$_POST['form_cpf'];
$form_email=$_POST['form_email'];
$form_telefone=$_POST['form_telefone'];
	$form_celular=$_POST['form_celular'];
		$form_atuacoes=$_POST['form_atuacoes'];
	$t =$_SESSION['botao'];




		$sql  = "UPDATE usuarios SET  user='$form_usuario', user_password='$form_senha', user_name='$form_nome', user_matricula='$form_matricula', user_cpf='$form_cpf', user_email='$form_email', user_Telefone='$form_telefone', user_celular='$form_celular', user_atuacoes='$form_atuacoes' WHERE user_id='$t' ";
if ($conn->query($sql) === TRUE) {
	
	                      echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/TrabalhoAilton/aprovacao.php'>
					<script type=\"text/javascript\">
						alert(\"Usuario editado com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/TrabalhoAilton/aprovacao.php'>
					<script type=\"text/javascript\">
						alert(\"O usuario não foi editado .\");
					</script>
				";	
			}
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
			$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios ORDER BY user_id DESC');
		$pdo_verifica->execute();

		
	
?>
<?php 
		
		
		include('encerraSessao.php');
		?>
		
	</body>
</html>
