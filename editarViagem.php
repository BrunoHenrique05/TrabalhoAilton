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
	//$i = [$_POST='botao'];
	
	session_start();
	$a=$_SESSION['j'];

	$tipoFormulario = utf8_decode($_POST['tipoFormulario']);
	$tipoSolitacao = utf8_decode($_POST['tipoSolitacao']);
	$finalidadeViagem = utf8_decode($_POST['finalidadeViagem']);
	$numeroBanco = utf8_decode($_POST['numeroBanco']);
	$numeroAgencia = utf8_decode($_POST['numeroAgencia']);
	$numeroConta = utf8_decode($_POST['numeroConta']);
	$ufOrigem = utf8_decode($_POST['ufOrigem']);
    $cidadeOrigem = utf8_decode($_POST['cidadeOrigem']);
	$ufDestino = utf8_decode($_POST['ufDestino']);
	$cidadeDestino = utf8_decode($_POST['cidadeDestino']);
	$dataSaida = utf8_decode($_POST['dataSaida']);		
	$dataRetorno = utf8_decode($_POST['dataRetorno']);
	$quantiadeDiarias = utf8_decode($_POST['quantidadeDiarias']);
	$arquivo = $_FILES["arquivo"]["tmp_name"]; 
	$tamanho = $_FILES["arquivo"]["size"];
	$justificativa = utf8_decode($_POST['justificativa']);
	$formaAfastamento = utf8_decode($_POST['formaAfastamento']);
    $meioTransporte = utf8_decode($_POST['meioTransporte']);
    $usuarios_user_id = $_SESSION['user_id']; 
			$fp = fopen($arquivo, "rb");
 			$conteudo = fread($fp, $tamanho);
 			$conteudo = addslashes($conteudo);
 			fclose($fp);
 			//$sql  = "UPDATE cadastroviagem SET recusa='$z' WHERE id = '$g'"; 
		$sql = "UPDATE cadastroViagem SET tipoFormulario='$tipoFormulario',tipoSolitacao='$tipoSolitacao',finalidadeViagem='$finalidadeViagem',numeroBanco='$numeroBanco',numeroAgencia='$numeroAgencia',numeroConta='$numeroConta',ufOrigem='$ufOrigem',cidadeOrigem='$cidadeOrigem',ufDestino='$ufDestino',cidadeDestino='$cidadeDestino',dataSaida='$dataSaida',dataRetorno='$dataRetorno',
quantiadeDiarias='$quantiadeDiarias',arquivo='$conteudo',justificativa='$justificativa',formaAfastamento='$formaAfastamento',meioTransporte='$meioTransporte' WHERE id=$a";	
//VALUES (,,,,,,,,,,,,,,,,, );


	
	if ($conn->query($sql) === TRUE) {
	
	                      echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/TrabalhoAilton/index.php'>
					<script type=\"text/javascript\">
						alert(\"Formulario Editado com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/TrabalhoAilton/index.php'>
					<script type=\"text/javascript\">
						alert(\"O Formulario não foi editado\");
					</script>
				";	
			}

			mysqli_close($conn);
	
	
?>

