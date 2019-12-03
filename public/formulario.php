<?php
	if(isset($_GET['L']))
		$statusL = $_GET['L'];
	else
		$statusL = "AP1";
	
	if(isset($_GET['M']))
		$statusM = $_GET['M'];
	else
		$statusM = "AP2";
	
	if(isset($_GET['N']))
		$statusN = $_GET['N'];
	else
		$statusN = "AP3";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Acender LEDs</title>        
    </head>
    <body>
	<h1>Acionar Leds - Acender ou Apagar</h1>
    <form name="formulario" id="formulario_acender_leds" action="process.php" method="get">
		<div>
			<label><strong>LED Vermelho</strong></label> 
			<div>
				<input type="radio" id="s" name="s" value="s" <?php if(strcmp ($statusL, "AC1") == 0) { echo ("checked"); } ?> /> <label>Acender</label>
				<input type="radio" id="s" name="s" value="s" <?php if(strcmp ($statusL, "AP1") == 0) { echo ("checked"); } ?> /> <label>Apagar</label>
			</div>
	   	</div>
		<div>
			<label><strong>LED Amarelho</strong></label> 
			<div>
				<input type="radio" id="t" name="t" value="t" <?php if(strcmp ($statusM, "AC2") == 0) { echo ("checked"); } ?> /> <label>Acender</label>
				<input type="radio" id="t" name="t" value="t" <?php if(strcmp ($statusM, "AP2") == 0) { echo ("checked"); } ?> /> <label>Apagar</label>
			</div>
		</div>
		<div>
			<label><strong>LED Azul</strong></label> 
			<div>
				<input type="radio" id="N" name="N" value="1" <?php if(strcmp ($statusN, "AC3") == 0) { echo ("checked"); } ?> /> <label>Acender</label>
				<input type="radio" id="N" name="N" value="0" <?php if(strcmp ($statusN, "AP3") == 0) { echo ("checked"); } ?> /> <label>Apagar</label>
			</div>
		</div>
		<div><input type="submit" name="acionar_leds" value="Acionar LEDs" /></div>
    </form>
</html>