<?php
// W skrypcie definicji kontrolera nie trzeba dołączać żadnego skryptu inicjalizacji.
// Konfiguracja, Messages i Smarty są dostępne za pomocą odpowiednich funkcji.
// Kontroler ładuje tylko to z czego sam korzysta.

require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

/** Kontroler kalkulatora
 * @author Przemysław Kudłacik
 *
 */
class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->x = getFromRequest('x');
		$this->form->y = getFromRequest('y');
		$this->form->op = getFromRequest('op');
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
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->x == "") {
			getMessages()->addError('Nie podano liczby 1');
		}
		if ($this->form->y == "") {
			getMessages()->addError('Nie podano liczby 2');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
			}
		}
		
		return ! getMessages()->isError();
	}
        
        /** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			getMessages()->addInfo('Parametry poprawne.');
				
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
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
        
        /**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		//nie trzeba już tworzyć Smarty i przekazywać mu konfiguracji i messages
		// - wszystko załatwia funkcja getSmarty()

		getSmarty()->assign('page_title','Kalkulator');
		getSmarty()->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC. Ćwiczenie');
		getSmarty()->assign('page_header','Obiekty w PHP');
				
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.html'); // już nie podajemy pełnej ścieżki - foldery widoków są zdefiniowane przy ładowaniu Smarty
	}
}

//================================================================================================

class CalcCreditCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $resultmr; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
                $this->resultmr = new CalcResult();
	}
	/** 
	 * Pobranie parametrów
	 */
        public function getParamsmr(){
		$this->form->kk = getFromRequest('kk');
		$this->form->il = getFromRequest('il');
		$this->form->opr = getFromRequest('opr');
	}
        
        /** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validatemr() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kk ) && isset ( $this->form->il ) && isset ( $this->form->opr ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kk == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->il == "") {
			getMessages()->addError('Nie podano ile lat');
		}
                if ($this->form->opr == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kk )) {
				getMessages()->addError('Kwota kredytu nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->il )) {
				getMessages()->addError('Liczba lat nie jest liczbą całkowitą');
			}
                        if (! is_numeric ( $this->form->opr )) {
				getMessages()->addError('Wartość oprocentowania nie jest liczbą całkowitą');
			}
		}
		
		return ! getMessages()->isError();
	}
        
        /** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function processmr(){

		$this->getparamsmr();
		
		if ($this->validatemr()) {
				
			//konwersja parametrów na int
			$this->form->kk = intval($this->form->kk);
			$this->form->il = intval($this->form->il);
			$this->form->opr = intval($this->form->opr);
			getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			getMessages()->addInfo('Wykonano obliczenia.');
                        $this->resultmr->resultmr =  $this->form->kk*(($this->form->opr * (1 + $this->form->opr) ^ $this->form->il))/(((1 + $this->form->opr) ^ $this->form->il - 1));
			
		}
		
		$this->generateViewmr();
	}
        
        /**
	 * Wygenerowanie widoku
	 */
	public function generateViewmr(){
		//nie trzeba już tworzyć Smarty i przekazywać mu konfiguracji i messages
		// - wszystko załatwia funkcja getSmarty()

		getSmarty()->assign('page_title','Kalkulator');
		getSmarty()->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC. Ćwiczenie');
		getSmarty()->assign('page_header','Obiekty w PHP');
		
		getSmarty()->assign('form',$this->form);
                getSmarty()->assign('resmr',$this->resultmr);
		
		getSmarty()->display('CalcView.html'); // już nie podajemy pełnej ścieżki - foldery widoków są zdefiniowane przy ładowaniu Smarty
	}
}