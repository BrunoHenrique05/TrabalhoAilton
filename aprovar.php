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
	$a=$_SESSION['a'];
	
	$i = $_POST['r'];
	$g=$_SESSION['b'];
	$s=$_SESSION['l'];
$z = $_POST['justificativa'];
if($s==3){
	$sql  = "UPDATE cadastroviagem SET numero='$z', status=4 WHERE id =  '$g'";
if ($conn->query($sql) === TRUE) {
	
	                      echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/TrabalhoAilton/aprovacao.php'>
					<script type=\"text/javascript\">
						alert(\"Formulario salvo com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/TrabalhoAilton/aprovacao.php'>
					<script type=\"text/javascript\">
						alert(\"O Formulario não foi cadastrado com Sucesso.\");
					</script>
				";	
			}


}else{


	if($i==1){
$sql  = "UPDATE cadastroviagem SET recusa='$z' , status=0 WHERE id = '$g'";
	//$sql  = "UPDATE cadastroviagem SET status=0 WHERE id =  '$g'";
if ($conn->query($sql) === TRUE) {
	
	                      echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/TrabalhoAilton/aprovacao.php'>
					<script type=\"text/javascript\">
						alert(\"Formulario recusado com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/TrabalhoAilton/aprovacao.php'>
					<script type=\"text/javascript\">
						alert(\"O Formulario não foi cadastrado com Sucesso.\");
					</script>
				";	
			}

	}else{




		 $s=$s+1;
		
	$sql  = "UPDATE cadastroviagem SET status='$s' WHERE id =  '$g'";

	
	if ($conn->query($sql) === TRUE) {
	
	                      echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/TrabalhoAilton/aprovacao.php'>
					<script type=\"text/javascript\">
						alert(\"Formulario aceito com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/TrabalhoAilton/aprovacao.php'>
					<script type=\"text/javascript\">
						alert(\"O Formulario não foi cadastrado com Sucesso.\");
					</script>
				";	
			}
}
}


// Create connection

// Check connection

















			mysqli_close($conn);
	
	
?>

