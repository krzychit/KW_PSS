<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_x">Liczba 1: </label>
	<input id="id_x" type="text" name="x" value="<?php if (isset($x)) print($x); ?>" /><br />
	<label for="id_op">Operacja: </label>
	<select name="op">
		<option value="plus">+</option>
		<option value="minus">-</option>
		<option value="times">*</option>
		<option value="div">/</option>
	</select><br />
	<label for="id_y">Liczba 2: </label>
	<input id="id_y" type="text" name="y" value="<?php if (isset($y)) print($y); ?>" /><br />
	<input type="submit" value="Oblicz" />
        
        <label for="id_kk">Kwota kredytu: </label>
	<input id="id_kk" type="text" name="kk" value="<?php if (isset($kk)) print($kk); ?>" /><br />
	<label for="id_il">Ile lat: </label>
	<input id="id_il" type="text" name="il" value="<?php if (isset($il)) print($il); ?>" /><br />
	<label for="id_opr">Oprocentowanie: </label>
	<input id="id_opr" type="text" name="opr" value="<?php if (isset($opr)) print($opr); ?>" /><br />
	<input type="submit" value="Oblicz miesieczna rate" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>
    
<?php if (isset($result_mr)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result_mr; ?>
</div>
<?php } ?>

</body>
</html>