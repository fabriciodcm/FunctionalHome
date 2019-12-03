<?php
	$parametro="";
	
	if(isset($_GET['s']))
		$parametro.= "s";
	
	if(isset($_GET['t']))
		$parametro.= "&t";
	
	
	// URL para onde serс enviada a requisiчуo GET
	$url_feed = "192.168.0.168?" . $parametro;
	 
	// Inicia a sessуo cURL
	$ch = curl_init();
	 
	// Informa a URL onde serс enviada a requisiчуo
	curl_setopt($ch, CURLOPT_URL, $url_feed);
	 
	// Se true retorna o conteњdo em forma de string para uma variсvel
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	// Envia a requisiчуo
	$result = curl_exec($ch);
	 
	// Finaliza a sessуo
	curl_close($ch);
	
	//Capturando retorno do Arduino para redirecionar ao formulario
	$retorno_arduino = explode("\n", $result);
	$novo_parametro = "L=" . trim($retorno_arduino[0]) . "&M=" . trim($retorno_arduino[1]) . "&N=" . trim($retorno_arduino[2]);
	header("Location: formulario.php?" . $novo_parametro);
?>