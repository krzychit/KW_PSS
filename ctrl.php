<?php
require_once 'init.php';
// Skrypt kontrolera głównego jako jedyny "punkt wejścia" inicjuje aplikację.

// Inicjacja ładuje konfigurację, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalające odwołać się z każdego miejsca w systemie do obiektów konfiguracji, messages i smarty.

// Nowością jest sama klasa ClassLoader oraz utworzenie obiektu tej klasy w skrypcie init z dostępem jak dla
// wcześniejszych obiekkót za pomocą funkcji getLoader(). Pozwala ona automatycznie załadować klasy umieszczone
// w głównym folderze aplikacji - w podfolderach zgodnie z ich przestrzeniami nazw (które są częścią pełnej nazwy klasy).

// Ponadto ładuje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy już tylko podjąć decyzję co zrobić na podstawie $action.

// Dodatkowo zmieniono organizację kontrolerów i widoków. Teraz wszystkie są w odpowiednio nazwanych folderach w app

switch ($action) {
	default : // 'calcView'  // akcja NIEPUBLICZNA
		include 'check.php'; // KONTROLA
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView ();
                $ctrl = new app\controllers\CalcCreditCtrl (); //poprawic usuwajac
                $ctrl->generateViewmr (); //poprawic usuwajac
	break;
	case 'login': // akcja PUBLICZNA - brak check.php
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogin();
	break;
	case 'calcCompute' : // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->process ();
	break;
        case 'calcCreditCompute' : // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		$ctrl = new app\controllers\CalcCreditCtrl ();
		$ctrl->processmr ();
	break;
	case 'logout' : // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogout();
	break;
	case 'action1' : // akcja PUBLICZNA - brak check.php
		// zrób coś innego publicznego ...
		print('reakcja na akcję publiczną ....');
	break;
}
