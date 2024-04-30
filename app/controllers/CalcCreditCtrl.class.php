<?php
// W skrypcie definicji kontrolera nie trzeba dołączać już niczego.
// Kontroler wskazuje tylko za pomocą 'use' te klasy z których jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np używa obiektu zwracanego przez funkcję)

// Zarejestrowany autoloader klas załaduje odpowiedni plik automatycznie w momencie, gdy skrypt będzie go chciał użyć.
// Jeśli nie wskaże się klasy za pomocą 'use', to PHP będzie zakładać, iż klasa znajduje się w bieżącej
// przestrzeni nazw - tutaj jest to przestrzeń 'app\controllers'.

// Przypominam, że tu również są dostępne globalne funkcje pomocnicze - o to nam właściwie chodziło

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;

/** Kontroler kalkulatora
 * @author Przemysław Kudłacik
 *
 */

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
		global $user;

		getSmarty()->assign('user',$user);
				
		getSmarty()->assign('page_title','Super kalkulator');
		
		getSmarty()->assign('form',$this->form);
                getSmarty()->assign('resmr',$this->resultmr);
		
		getSmarty()->display('CalcView.tpl');
	}
}