
<?php
// Inclui o arquivo de configuração
include('login/config.php');
// Inclui o arquivo de verificação de login
include('login/verifica_login.php');
// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login


include('login/redirect.php');

$a = $_POST["r"];
if($a != 1){
header('location: ' . dirname( $_SERVER['PHP_SELF'] ) . '/aprovacao.php');
}else{

}

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

$r = $_POST['botao'];
$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM cadastroviagem ORDER BY id DESC');
		$pdo_verifica->execute();
		
		while( $fetch = $pdo_verifica->fetch() ) {
			if($fetch['id']==$r){
			
$a=$fetch['usuarios_user_id'];

}
}


$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM usuarios ORDER BY user_id DESC');
		$pdo_verifica->execute();

		
		while( $fetch = $pdo_verifica->fetch() ) {
			
			if($fetch['user_id']==$a){
			
			


echo '

			<h4><b>Dados Pessoais</b></h4>
			<br>
				
			
				<label  for="matricula">Nome: </label> 
			<input readonly="true" type="nome" class="form-control" id="nome"  value='. $fetch['user_name'] .' style="padding-right : 230px;" required style="width: 570px;"> 
				<br>
				<label readonly="true" for="matricula">Matrícula: </label> 
			<input readonly="true" type="text" class="form-control" id="matricula"  value='. $fetch['user_matricula'] .'
			 style="padding-right : 230px;" required style="width: 570px;">
				<br>
				<label for="cpf">CPF: </label>
			<input readonly="true" type="text" class="form-control" id="cpf"  value='. $fetch['user_cpf'] .' style="padding-right : 230px;" required style="width: 570px;">
				<br>
				<label for="email">Email: </label>
			<input readonly="true" type="text" class="form-control" id="email"  value=' . $fetch['user_email'] . ' style="padding-right : 230px;"  required style="width: 570px;">
				<br>
				<label for="telefone">Telefone: </label>
			<input readonly="true" type="text" class="form-control" id="email"  value=' . $fetch['user_Telefone'] . ' style="padding-right : 230px;"  required style="width: 570px;">
				<br>

				<label for="celular">Celular: </label>
			<input readonly="true" type="text" class="form-control" id="email"  value=' . $fetch['user_celular'] . ' style="padding-right : 230px;"  required style="width: 570px;">
				<br>
				<label for="atuacao">Atuações: </label>
			<input  readonly="true"type="text" class="form-control" id="celular"  value=' . $fetch['user_atuacoes'] . ' style="padding-right : 230px;" required style="width: 570px;">
				<br>
				';
		
		}
	
		}



		$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM cadastroviagem ORDER BY id DESC');
		$pdo_verifica->execute();
		
		while( $fetch = $pdo_verifica->fetch() ) {
			if($fetch['id']==$r){
			
			
			
?>

			<h4><b>Tipo de Formulário</b></h4>
			<br>

			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right : 100px;" class="form-check-label" align="left">
					<input  class="form-check-input" type="radio" <?php echo ($fetch['tipoFormulario'] == "inicial") ? "checked" : null; ?> name="tipoFormulario" id="inicial"  value="inicial" disabled> Inicial
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input readonly="true" class="form-check-input" type="radio" name="tipoFormulario"  <?php echo ($fetch['tipoFormulario'] == "prorrogacao") ? "checked" : null; ?> id="prorrogacao" value="prorrogacao" disabled> Prorrogação / Complementação
				</label>
			</div>
		<br><br>

			<!--**********************************************************************************************************************-->



			<h4><b>Tipo de Solicitação</b></h4>
			<br>
			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right: 100px;" class="form-check-label" align="left">
					<input class="form-check-input" type="radio" name="tipoSolitacao" id="diaria"<?php echo ($fetch['tipoSolitacao'] == "diaria") ? "checked" : null; ?> value="diaria" disabled> Diária
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="tipoSolitacao"<?php echo ($fetch['tipoSolitacao'] == "passagem") ? "checked" : null; ?> id="passagem" value="passagem" disabled> Passagem
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio"<?php echo ($fetch['tipoSolitacao'] == "ressarcimento") ? "checked" : null; ?> name="tipoSolitacao"  id="ressarcimento" value="ressarcimento" disabled> Ressarcimento
				</label>
			</div>
		<br><br>


			<!--**********************************************************************************************************************-->

			<h4><b>Finalidade</b></h4>
			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right: 100px;" class="form-check-label" align="left">
					<input class="form-check-input" type="radio" name="finalidadeViagem"<?php echo ($fetch['finalidadeViagem'] == "atvGestao") ? "checked" : null; ?> id="atvGestao" value="atvGestao" disabled> Atividade de Gestão
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="finalidadeViagem"<?php echo ($fetch['finalidadeViagem'] == "capacitacao") ? "checked" : null; ?> id="capacitacao" value="capacitacao" disabled> Capacitação
				</label>
			</div>
		<br><br>


			<!--**********************************************************************************************************************-->
<?php 

echo'

			<h4><b>Dados Bancários</b></h4>
			<br>
			<div class="form-group col-md-4">
				<label for="numBanco">N° Banco: </label>
				<input readonly="true" type="text" class="form-control" id="numBanco" placeholder="N°do Banco"value='. $fetch['numeroBanco'] .' name="numeroBanco" required>
			</div>
			<div class="form-group col-md-4">
				<label for="numAgencia">Agência: </label>
				<input readonly="true" type="text" class="form-control" id="numAgencia"value='. $fetch['numeroAgencia'] .' placeholder="N° da agência" name="numeroAgencia" required>
			</div>
			<div class="form-group col-md-4">
				<label for="numConta">Conta Corrente: </label>
				<input readonly="true" type="text" class="form-control" id="numConta"value='. $fetch['numeroConta'] .' placeholder="N° da Conta" name="numeroConta" required>
			</div>


			<!--**********************************************************************************************************************-->


			<h4><b>Viagem</b></h4>



			<div class="form-group col-md-4">
				<label for="origem">Origem </label>
				<input readonly="true" type="text" class="form-control" id="origem" placeholder="Ex: Ituiutaba" value='. $fetch['cidadeOrigem'] .' name="cidadeOrigem" required>
			</div>
			<div class="form-group col-md-2">
				<label for="ufOrigem">UF: </label>
				<input readonly="true" type="text" class="form-control" id="ufOrigem"value='. $fetch['ufOrigem'] .' placeholder="Ex: MG" name="ufOrigem" required>
			</div>
			<div class="form-group col-md-4">
				<label for="destino">Destino </label>
				<input readonly="true" type="text" class="form-control" id="destino" placeholder="Ex: São Paulo"value='. $fetch['cidadeDestino'] .' name="cidadeDestino" required>
			</div>
			<div class="form-group col-md-2">
				<label for="ufDestino">UF: </label>
				<input readonly="true" type="text" class="form-control" id="ufDestino"value='. $fetch['ufDestino'] .' placeholder="Ex: SP" name="ufDestino" required>
			</div>


			<!--**********************************************************************************************************************-->


			<h4><b>Período do Evento</b></h4>
			<br>
			<div class="form-group col-md-3">
				<label for="saida">Data de Saída </label>
				<input readonly="true" type="date" class="form-control" id="saida" name="dataSaida"value='. $fetch['dataSaida'] .' required style="width: 150px;">
			</div>
			<div class="form-group col-md-2">
				<label for="retorno">Data de Retorno </label>
				<input readonly="true" onblur="preenche();" type="date"  class="form-control" id="retorno"value='. $fetch['dataRetorno'] .' name="dataRetorno" required>
			</div>
	



			<div class="form-group col-md-3">
				<label for="destino">Quantidade de Diárias </label>
				<input readonly="true" readonly="true" type="text" class="form-control" id="qtdDiaria" placeholder="" name="quantidadeDiarias"  value= ' .$fetch['quantiadeDiarias'].' required style="width: 200px;">
			</div>

			<div class="form-group col-md-2">
				<label  for="horaInicio">De </label>
				<input readonly="true" type="time" class="form-control" value= ' .$fetch['de'].' id="horaInicio" name="de"   required>

			</div>
			<div class="form-group col-md-2">
				<label  for="horaFim">Às </label>
				<input readonly="true" type="time" class="form-control" id="horaFim" value= ' .$fetch['ate'].' name="ate"  required > <br>
			</div> 
			';


			

echo'
			<div class="form-check form-check-inline" align="left">
				<table>	
				<tr>
				<td><label for="arquivo"><h4><b>Upload de Documento:</b></h4></label></td>
				<br>
			    <td>
		          <a href="upload/'.$fetch['arquivo'].'" download>'.$fetch['arquivo'].'</a>
				</td>
				</tr>
				</table>
			</div>


			<!--**********************************************************************************************************************-->

			';
?>

			<h4><b>Forma de Afastamento</b></h4><br>
			<div class="form-check form-check-inline"value='. $fetch['formaAfastamento'] .' align="left" style="padding-left: 67px;">
				<label style="padding-right: 100px;" class="form-check-label" align="left">
					<input class="form-check-input" type="radio" name="formaAfastamento"<?php echo ($fetch['formaAfastamento'] == "diariaTotal") ? "checked" : null; ?> id="diariaTotal" value="diariaTotal" disabled> Diária Total
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="formaAfastamento"<?php echo ($fetch['formaAfastamento'] == "diariaMeia") ? "checked" : null; ?> id="diariaMeia" value="diariaMeia" disabled> Diária 50%
				</label>
				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="formaAfastamento"<?php echo ($fetch['formaAfastamento'] == "diariaNenhuma") ? "checked" : null; ?> id="diariaNenhuma" value="diariaNenhuma" disabled> Sem Diária
				</label>
			</div>


			<!--**********************************************************************************************************************-->


			<h4><b>Meio de Transporte</b></h4><br>
			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right: 100px;" class="form-check-label">
					<input class="form-check-input" type="radio" name="meioTransporte" id="aereo"<?php echo ($fetch['meioTransporte'] == "aereo") ? "checked" : null; ?> value="aereo" disabled> Aéreo
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="meioTransporte"<?php echo ($fetch['meioTransporte'] == "rodoviario") ? "checked" : null; ?> id="rodoviario" value="rodoviario" disabled> Rodoviário
				</label>
				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="meioTransporte"<?php echo ($fetch['meioTransporte'] == "oficial") ? "checked" : null; ?> id="oficial" value="oficial" disabled> Veículo Oficial
				</label>
			


			<!--**********************************************************************************************************************-->



			<p><h7><i>OBS.: (*) A proposta de viagem com passagem aérea, deve ser realizada com antecedência mínima de 10 (dez) dias conf. exigência do inciso I, do art. 1º da Portaria 505/2009.
			</i> </h7> <br>


			<!--**********************************************************************************************************************-->
<?php 
echo '

			    <div class="form-group"><br>
				
				<label for="justificativa">  <h4><b>Justificativa da Viagem</b></h4><br></label><br>
				<textarea readonly="true" style="height: 140px; width: 1000px;" name="justificativa"  class="form-control" id="justificativa" rows="6" style="border-radius: 10px" ;> '.$fetch['justificativa'].'
				</textarea>
				</div>

';
	
		}
		}




		?>
		</table>


				
		</form>		

      
	  	<?php 
	  	if($_SESSION['l']==3){
	  		echo '		
  <div class="form-group"><br>

<form method="POST" action="aprovar.php">
				
				<label for="numero do "> <h4><b>Numero  SCDP(Sistema de Concessão de Diárias e Passagens) </h4><br></label><br>
				<textarea tyle="height: 60px; width: 150px;" name="justificativa" required="" class="form-control" id="justificativa" rows="6" style="border-radius: 10px;" onfocus="cleanit(this);refresh_nu()" placeholder= "numero do  SCDP(Sistema de Concessão de Diárias e Passagens)."></textarea>
			     </div>
			     <button style="width: 180px; color: #FFFFFF; background-color:red; border: 1px black; " type="submit" class="btn btn-default" name="r" value="1" >Salvar</button>
';
	  	} else{
echo '		
  <div class="form-group"><br>

<form method="POST" action="aprovar.php">

	 <div class="form-group"><br>
				<form method="POST" action="aprovar.php">
				
				<button style="width: 180px; color: #FFFFFF; background-color:#4CAF50; border: 1px black; " type="submit" class="btn btn-default" value="Cadastrar">Aprovar</button>
			</form>			
			
  </div>
  <form method="POST" action="aprovar.php">
				
				<label for="justificativa de recusa"> <h4><b>Justificativa de Recusa</b></h4><br></label><br>
				<textarea tyle="height: 60px; width: 150px;" name="justificativa" required="" class="form-control" id="justificativa" rows="6" style="border-radius: 10px;" onfocus="cleanit(this);refresh_nu()" placeholder= "Motivo de recusa do formulario, favor especificar o motivo com detalhes."></textarea>
			     </div>
			     <button style="width: 180px; color: #FFFFFF; background-color:red; border: 1px black; " type="submit" class="btn btn-default" name="r" value="1" >Recusar</button>
	</form>	
';
}
?>
</form>

</body>
</html>

