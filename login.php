<?php
// Inicia a sessão
session_start();

?>

<!doctype html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Cesar Szpak">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



   <style>


   body{

    background-color: white;
   }


  </style>


  </head>



		<body>
  		<div>
 			<div align="center"><img style="height: 140px;  padding-right: 30px;" src="imagens/logo.png"></div>
		<br><br>
		</div>
         
	
		
		<br>

		<form class="form-signin" action="index.php" method="post">
       <div>
      <h1> LOGIN </h1></center>
	<br>
       <input size="150" type="text" name="usuario"   class="form-control" placeholder="usuario" required autofocus>
       <input size="150" type="password" name="senha"   class="form-control" placeholder="Senha" required>
	
     
        	</div>		
			<div align="left">

				<?php if ( ! empty( $_SESSION['login_erro'] ) ) :?>
					
						<td style="color: red;"><?php echo $_SESSION['login_erro'];?></td>
						<?php $_SESSION['login_erro'] = ''; ?>
					
				<?php endif; ?>

        </div>    

				<br>
				<div align="right">
					<button style="width: 70px; color: #FFFFFF; background-color:#4CAF50; border: 1px black; " type="submit" class="btn btn-default" value="Entrar">Entrar</button>
				</div>

		
		
	
				
			
		</form>
	</body>
</html>
