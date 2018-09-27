<?php
//session_start(); 
if ( isset( $_SESSION["sessiontime"] ) ) { 
	if ($_SESSION["sessiontime"] < time() ) { 
		session_unset();
		//echo "Seu tempo Expirou!";
		//Redireciona para login
	} else {
		//echo 'Logado ainda!';
		//Seta mais tempo 60 segundos
		$_SESSION['atuacoes'];
		$_SESSION["sessiontime"] = time() + 100000000;
	}
} else { 
	session_unset();
	//Redireciona para login
}