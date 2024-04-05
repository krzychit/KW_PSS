<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$operation = $_REQUEST ['op'];

// 1. Moje zmiany:

$kk = $_REQUEST ['kk'];
$il = $_REQUEST ['il'];
$opr = $_REQUEST ['opr'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($x) && isset($y) && isset($operation))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// 2. Moje zmiany:
if ( ! (isset($kk) && isset($il) && isset($opr))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $x == "") {
	$messages [] = 'Nie podano liczby 1';
}
if ( $y == "") {
	$messages [] = 'Nie podano liczby 2';
}

// Moje zmiany:
if ( $kk == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}

if ( $il == "") {
	$messages [] = 'Nie podano ile lat';
}

if ( $opr == "") {
	$messages [] = 'Nie podano oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
        
        // Moje zmiany:
        if (! is_numeric( $kk )) {
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą';
	}
        
        if (! is_numeric( $il )) {
		$messages [] = 'Liczba lat nie jest liczbą całkowitą';
	}
        
        if (! is_numeric( $opr )) {
		$messages [] = 'Wartość oprocentowania nie jest liczbą całkowitą';
	}

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$x = intval($x);
	$y = intval($y);
        
        //Moje zmiany:
        $kk = intval($kk);
	$il = intval($il);
	$opr = intval($opr);
	
	//wykonanie operacji
	switch ($operation) {
		case 'minus' :
			$result = $x - $y;
			break;
		case 'times' :
			$result = $x * $y;
			break;
		case 'div' :
			$result = $x / $y;
			break;
		default :
			$result = $x + $y;
			break;
	}
        
        //Wyliczenie miesiecznej raty:
        $result_mr = $kk*(($opr * (1+$opr)^$il))/(((1 + $opr)^$il - 1));
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';