<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

/** Kontroler kalkulatora
 * @author Przemysław Kudłacik
 *
 */

class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $resultmr; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
                $this->resultmr = new CalcResult();
		$this->hide_intro = false;
	}
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
		$this->form->y = isset($_REQUEST ['y']) ? $_REQUEST ['y'] : null;
		$this->form->op = isset($_REQUEST ['op']) ? $_REQUEST ['op'] : null;
	}
        public function getParamsmr(){
		$this->form->kk = isset($_REQUEST ['kk']) ? $_REQUEST ['kk'] : null;
		$this->form->il = isset($_REQUEST ['il']) ? $_REQUEST ['il'] : null;
		$this->form->opr = isset($_REQUEST ['opr']) ? $_REQUEST ['opr'] : null;
	}
        
        /** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->op ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		} else { 
			$this->hide_intro = true; //przyszły pola formularza, więc - schowaj wstęp
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->x == "") {
			$this->msgs->addError('Nie podano liczby 1');
		}
		if ($this->form->y == "") {
			$this->msgs->addError('Nie podano liczby 2');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->x )) {
				$this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				$this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
			}
		}
		
		return ! $this->msgs->isError();
	}

	public function validatemr() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kk ) && isset ( $this->form->il ) && isset ( $this->form->opr ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		} else { 
			$this->hide_intro = true; //przyszły pola formularza, więc - schowaj wstęp
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kk == "") {
			$this->msgs->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->il == "") {
			$this->msgs->addError('Nie podano ile lat');
		}
                if ($this->form->opr == "") {
			$this->msgs->addError('Nie podano oprocentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kk )) {
				$this->msgs->addError('Kwota kredytu nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->il )) {
				$this->msgs->addError('Liczba lat nie jest liczbą całkowitą');
			}
                        if (! is_numeric ( $this->form->opr )) {
				$this->msgs->addError('Wartość oprocentowania nie jest liczbą całkowitą');
			}
		}
		
		return ! $this->msgs->isError();
	}
        
        /** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			$this->msgs->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			switch ($this->form->op) {
				case 'minus' :
					$this->result->result = $this->form->x - $this->form->y;
					$this->result->op_name = '-';
					break;
				case 'times' :
					$this->result->result = $this->form->x * $this->form->y;
					$this->result->op_name = '*';
					break;
				case 'div' :
					$this->result->result = $this->form->x / $this->form->y;
					$this->result->op_name = '/';
					break;
				default :
					$this->result->result = $this->form->x + $this->form->y;
					$this->result->op_name = '+';
					break;
			}
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		//$this->generateView();
	}

	public function processmr(){

		$this->getparamsmr();
		
		if ($this->validatemr()) {
				
			//konwersja parametrów na int
			$this->form->kk = intval($this->form->kk);
			$this->form->il = intval($this->form->il);
			$this->form->opr = intval($this->form->opr);
			$this->msgs->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			$this->msgs->addInfo('Wykonano obliczenia.');
                        $this->result->result =  $this->form->kk*(($this->form->opr * (1 + $this->form->opr) ^ $this->form->il))/(((1 + $this->form->opr) ^ $this->form->il - 1));
			
		}
		
		$this->generateView();
	}
        
        /**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC. Ćwiczenie');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
                $smarty->assign('resmr',$this->resultmr);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}