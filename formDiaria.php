
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
	<title> Solicitação de Diárias </title>
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
<script type="text/javascript">
function preenche(){
var dataInicio = new Date(document.getElementById("saida").value);
var dataFim = new Date(document.getElementById("retorno").value);
var c = Math.abs( dataFim.getTime() - dataInicio.getTime());
var d = Math.ceil(c / (1000 * 3600 * 24)); 
document.getElementById('qtdDiaria').value = d;
}
</script>

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
	
	<form method="POST" action="processa_cad_viagens.php" enctype="multipart/form-data">

        
		<br><br><br><br>
		<div class="container">

			<h4><b>Dados Pessoais</b></h4>
			<br>
				
			
				<label  for="matricula">Nome: </label> 
			<input readonly="true" type="nome" class="form-control" id="nome"  value="<?php echo $_SESSION['nome_usuario']; ?>" style="padding-right : 230px;" required style="width: 570px;"> 
				<br>
				<label readonly="true" for="matricula">Matrícula: </label> 
			<input readonly="true" type="text" class="form-control" id="matricula"  value="<?php echo $_SESSION['matricula']; ?>" style="padding-right : 230px;" required style="width: 570px;">
				<br>
				<label for="cpf">CPF: </label>
			<input readonly="true" type="text" class="form-control" id="cpf"  value="<?php echo $_SESSION['cpf']; ?>" style="padding-right : 230px;" required style="width: 570px;">
				<br>
				<label for="email">Email: </label>
			<input readonly="true" type="text" class="form-control" id="email"  value="<?php echo $_SESSION['email']; ?>" style="padding-right : 230px;"  required style="width: 570px;">
				<br>
				<label for="telefone">Telefone: </label>
			<input readonly="true" type="text" class="form-control" id="telefone"  value="<?php echo $_SESSION['telefone']; ?>" style="padding-right : 230px;" required style="width: 570px;">
				<br>
				<label for="celular">Celular: </label>
			<input  readonly="true"type="text" class="form-control" id="celular"  value="<?php echo $_SESSION['celular']; ?>" style="padding-right : 230px;" required style="width: 570px;">
				<br>
				<label for="atuacao">Atuações: </label>
			<input  readonly="true"type="text" class="form-control" id="celular"  value="<?php echo $_SESSION['atuacoes']; ?>" style="padding-right : 230px;" required style="width: 570px;">
				<br>

		


		<br><br>

			<h4><b>Tipo de Formulário</b></h4>
			<br>
			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right : 100px;" class="form-check-label" align="left">
					<input class="form-check-input" type="radio" name="tipoFormulario" id="inicial" value="inicial"> Inicial
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="tipoFormulario" id="prorrogacao" value="prorrogacao"> Prorrogação / Complementação
				</label>
			</div>
		<br><br>

			<!--**********************************************************************************************************************-->

			<h4><b>Tipo de Solicitação</b></h4>
			<br>
			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right: 100px;" class="form-check-label" align="left">
					<input class="form-check-input" type="radio" name="tipoSolitacao" id="diaria" value="diaria"> Diária
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="tipoSolitacao" id="passagem" value="passagem"> Passagem
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="tipoSolitacao"  id="ressarcimento" value="ressarcimento"> Ressarcimento
				</label>
			</div>
		<br><br>


			<!--**********************************************************************************************************************-->


			<h4><b>Finalidade</b></h4>
			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right: 100px;" class="form-check-label" align="left">
					<input class="form-check-input" type="radio" name="finalidadeViagem" id="atvGestao" value="atvGestao"> Atividade de Gestão
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="finalidadeViagem" id="capacitacao" value="capacitacao"> Capacitação
				</label>
			</div>
		<br><br>


			<!--**********************************************************************************************************************-->


			<h4><b>Dados Bancários</b></h4>
			<br>
			<div class="form-group col-md-4">
				<label for="numBanco">N° Banco: </label>
				<input type="text" class="form-control" id="numBanco" placeholder="N°do Banco" name="numeroBanco" required>
			</div>
			<div class="form-group col-md-4">
				<label for="numAgencia">Agência: </label>
				<input type="text" class="form-control" id="numAgencia" placeholder="N° da agência" name="numeroAgencia" required>
			</div>
			<div class="form-group col-md-4">
				<label for="numConta">Conta Corrente: </label>
				<input type="text" class="form-control" id="numConta" placeholder="N° da Conta" name="numeroConta" required>
			</div>


			<!--**********************************************************************************************************************-->


			<h4><b>Viagem</b></h4>
			<br>
			<div class="form-group col-md-4">
				<label for="origem">Origem </label>
				<input type="text" class="form-control" id="origem" placeholder="Ex: Ituiutaba" name="cidadeOrigem" required>
			</div>
			<div class="form-group col-md-2">
				<label for="ufOrigem">UF: </label>
				<input type="text" class="form-control" id="ufOrigem" placeholder="Ex: MG" name="ufOrigem" required>
			</div>
			<div class="form-group col-md-4">
				<label for="destino">Destino </label>
				<input type="text" class="form-control" id="destino" placeholder="Ex: São Paulo" name="cidadeDestino" required>
			</div>
			<div class="form-group col-md-2">
				<label for="ufDestino">UF: </label>
				<input type="text" class="form-control" id="ufDestino" placeholder="Ex: SP" name="ufDestino" required>
			</div>


			<!--**********************************************************************************************************************-->


			<h4><b>Período do Evento</b></h4>
			<br>
			<div class="form-group col-md-3">
				<label for="saida">Data de Saída </label>
				<input type="date" class="form-control" id="saida" name="dataSaida" required style="width: 150px;">
			</div>
			<div class="form-group col-md-2">
				<label for="retorno">Data de Retorno </label>
				<input onblur="preenche();" type="date"  class="form-control" id="retorno" name="dataRetorno" required>
			</div>
	



			<div class="form-group col-md-3">
				<label for="destino">Quantidade de Diárias </label>
				<input readonly="true" type="text" class="form-control" id="qtdDiaria" placeholder="Ex: 7" name="quantidadeDiarias"  value=""  required style="width: 200px;">
			</div>
			<div class="form-group col-md-2">
				<label  for="horaInicio">De </label>
				<input type="time" class="form-control" id="horaInicio" name="de"   required>

			</div>
			<div class="form-group col-md-2">
				<label  for="horaFim">Às </label>
				<input type="time" class="form-control" id="horaFim" name="ate"  required > <br>
			</div> 


			<!--**********************************************************************************************************************-->


			<div class="form-check form-check-inline" align="left">
				<table>	
				<tr>
				<td><label for="arquivo"><h4><b>Upload de Documento: </b> </h4></label></td>
				
		
				<td><input type="file" name="arquivo"></td>
				</tr>
				</table>
			</div>


			<!--**********************************************************************************************************************-->


			<h4><b>Forma de Afastamento</b></h4><br>
			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right: 100px;" class="form-check-label" align="left">
					<input class="form-check-input" type="radio" name="formaAfastamento" id="diariaTotal" value="diariaTotal"> Diária Total
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="formaAfastamento" id="diariaMeia" value="diariaMeia"> Diária 50%
				</label>
				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="formaAfastamento" id="diariaNenhuma" value="diariaNenhuma"> Sem Diária
				</label>
			</div>


			<!--**********************************************************************************************************************-->


			<h4><b>Meio de Transporte</b></h4><br>
			<div class="form-check form-check-inline" align="left" style="padding-left: 67px;">
				<label style="padding-right: 100px;" class="form-check-label">
					<input class="form-check-input" type="radio" name="meioTransporte" id="aereo" value="aereo"> Aéreo
				</label>

				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="meioTransporte" id="rodoviario" value="rodoviario"> Rodoviário
				</label>
				<label style="padding-right: 100px;" class="form-check-label" >
					<input class="form-check-input" type="radio" name="meioTransporte" id="oficial" value="oficial"> Veículo Oficial
				</label>
			</div>


			<!--**********************************************************************************************************************-->


			<h7><i>OBS.: (*) A proposta de viagem com passagem aérea, deve ser realizada com antecedência mínima de 10 (dez) dias conf. exigência do inciso I, do art. 1º da Portaria 505/2009.
			</i> </h7> <br>


			<!--**********************************************************************************************************************-->


			    <div class="form-group"><br>
				
				<label for="justificativa"> <h4><b>Justificativa da Viagem</b></h4><br></label><br>
				<textarea tyle="height: 60px; width: 150px;" name="justificativa" class="form-control" id="justificativa" rows="6" style="border-radius: 10px;" onfocus="cleanit(this);refresh_nu()" placeholder= 'JUSTIFICATIVA PELO ENCAMINHAMENTO DO PEDIDO COM MENOS DE 10 DIAS DE ANTECEDÊNCIA DO DESLOCAMENTO(INCISOS I E IX, ART. 2º -PORT. MPOG Nº 98/03 / FERIADO OU FINAL DE SEMANA - § 2º, ART. 5º- DECRETO Nº 5.992/06)'></textarea>
			     </div>


			<!--**********************************************************************************************************************-->


			<div class="botao" id="btnEnvia" align="center" style="padding-top: 70px;">
				
				<button style="width: 180px; color: #FFFFFF; background-color:#4CAF50; border: 1px black; " type="submit" class="btn btn-default" value="Cadastrar">Enviar</button>
			</div>


		</div>

	</div>
</form>

<?php
include('encerraSessao.php');
?>

</body>
</html>

