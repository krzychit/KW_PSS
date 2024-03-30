<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/securityapp/check.php';

// 1. pobranie parametrów
function getParams(&$x,&$y,&$operation){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
        $kk = isset ($_REQUEST ['kk']) ? $_REQUEST ['kk'] : null;
        $il = isset ($_REQUEST ['il']) ? $_REQUEST ['il'] : null;
        $opr = isset ($_REQUEST ['opr']) ? $_REQUEST ['opr'] : null;
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$x,&$y,&$operation,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($x) && isset($y) && isset($operation))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}
 
// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $x == "") {
	$messages [] = 'Nie podano liczby 1';
}
if ( $y == "") {
	$messages [] = 'Nie podano liczby 2';
}        

//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
        
        if (count ( $messages ) != 0) return false;
	else return true;
}
function validatemr(&$kk,&$il,&$opr,&$messages){
    if ( ! (isset($kk) && isset($il) && isset($opr))) {
        return false;
    }

if ( $kk == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}

if ( $il == "") {
	$messages [] = 'Nie podano ile lat';
}

if ( $opr == "") {
	$messages [] = 'Nie podano oprocentowania';
}

        if (! is_numeric( $kk )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
        
        if (! is_numeric( $il )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
        
        if (! is_numeric( $opr )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}

	if (count ( $messages ) != 0) return false;
	else return true;
}

// 3. wykonaj zadanie jeśli wszystko w porządku

function process(&$x,&$y,&$operation,&$messages,&$result){
	global $role;

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$x = intval($x);
	$y = intval($y);
	
	//wykonanie operacji
	switch ($operation) {
		case 'minus' :
			if ($role == 'admin'){
				$result = $x - $y;
			} else {
				$messages [] = 'Tylko administrator może odejmować !';
			}
			break;
		case 'times' :
			$result = $x * $y;
			break;
		case 'div' :
			if ($role == 'admin'){
				$result = $x / $y;
			} else {
				$messages [] = 'Tylko administrator może dzielić !';
			}
			break;
		default :
			$result = $x + $y;
			break;
	}
	
	
    }
 }

 function processmr(&$kk,&$il,&$opr,&$messages,&$result_mr){
	global $role;
 if (empty ( $messages )) { // gdy brak błędów
     
        $kk = intval($kk);
	$il = intval($il);
	$opr = intval($opr);
        
        //oblicz miesieczna rate
        if ($role == 'admin'){
            $result_mr = $kk*(($opr * (1+$opr)^$il))/(((1 + $opr)^$il - 1));
			} else {
				$messages [] = 'Tylko administrator może wyliczyc miesieczna rate!';
			}
 }
 }
 
//definicja zmiennych kontrolera
$x = null;
$y = null;
$operation = null;
$kk = null;
$il = null;
$opr = null;
$result = null;
$result_mr = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($x,$y,$operation) || ($kk,$il,$opr));
if ( validate($x,$y,$operation,$messages) ) { // gdy brak błędów
	process($x,$y,$operation,$messages,$result);
} else {
if ( validatemr ($kk,$il,$opr,$messages) { // gdy brak błędów
	processmr($kk,$il,$opr,$messages,$result_mr)
}

//getParamsmr($kk,$il,$opr);
//if ( validatemr($kk,$il,$opr,$messages) ) { // gdy brak błędów
//	processmr($kk,$il,$opr,$messages,$result_mr);
//}

}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';