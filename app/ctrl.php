<?php
// Skrypt kontrolera głównego uruchamiający określoną
// akcję użytkownika na podstawie przekazanego parametru

//każdy punkt wejścia aplikacji (skrypt uruchamiany bezpośrednio przez klienta) musi dołączać konfigurację
require_once dirname (__FILE__).'/../config.php';

//1. pobierz nazwę akcji

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

//2. wykonanie akcji
switch ($action) {
	default : // 'calcView'
	    // załaduj definicję kontrolera
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
                $ctrl = new CalcCreditCtrl ();
                $ctrl->generateViewmr ();
	break;
	case 'calcCompute' :
		// załaduj definicję kontrolera
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
        case 'calcCreditCompute' :
	    // załaduj definicję kontrolera
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCreditCtrl ();
		$ctrl->processmr ();
	break;
	case 'action2' :
		// zrób coś innego ...
	break;
}
