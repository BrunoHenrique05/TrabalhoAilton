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
	
	session_start();

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
	$justificativa = utf8_decode($_POST['justificativa']);
	$formaAfastamento = utf8_decode($_POST['formaAfastamento']);
    $meioTransporte = utf8_decode($_POST['meioTransporte']);
    $usuarios_user_id = $_SESSION['user_id']; 
    $de = $_POST['de'];
    $ate = $_POST['ate'];
    if(isset($_FILES['arquivo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()).$extensao; //define o nome do arquivo
    $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
		$sql = "INSERT INTO cadastroViagem (tipoFormulario,tipoSolitacao,finalidadeViagem,numeroBanco,numeroAgencia,numeroConta,ufOrigem,cidadeOrigem,ufDestino,cidadeDestino,dataSaida,dataRetorno,
            quantiadeDiarias,arquivo,justificativa,formaAfastamento,meioTransporte,usuarios_user_id,de,ate,status)
			VALUES ('$tipoFormulario','$tipoSolitacao','$finalidadeViagem','$numeroBanco','$numeroAgencia','$numeroConta','$ufOrigem','$cidadeOrigem','$ufDestino','$cidadeDestino','$dataSaida','$dataRetorno','$quantiadeDiarias','$novo_nome','$justificativa','$formaAfastamento','$meioTransporte','$usuarios_user_id','$de','$ate',1)";

		}

	if ($conn->query($sql) === TRUE) {
	
	                      echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/TrabalhoAilton/formDiaria.php'>
					<script type=\"text/javascript\">
						alert(\"Formulario cadastrado com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/TrabalhoAilton/formDiaria.php'>
					<script type=\"text/javascript\">
						alert(\"O Formulario não foi cadastrado com Sucesso.\");
					</script>
				";	
			}

			mysqli_close($conn);
	
	
?>

