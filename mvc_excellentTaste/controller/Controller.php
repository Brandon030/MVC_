<?php
require_once 'model/klantenLogic.php';
require_once 'model/reserveringsLogic.php';

class Controller{
	
	public function __construct() {
		$this->klantenLogic = new klantenLogic();
		$this->reserveringsLogic = new reserveringsLogic();

	}

	/*
	Bekijkt of ?op leeg is
	Bekijkt of die gelijk is aan een van de cases
	voert de method uit die bij de case hoort
	*/
	public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op'])?$_REQUEST['op']:NULL;
			switch ($op) {
				case 'createKlant':
				$this->collectCreateKlant();
				break;
				case 'readsKlanten':
				$this->collectReadsKlanten();
				break;
				case 'readKlant':
				$this->collectReadKlant($_REQUEST['Klant_id']);
				break;
				case 'updateKlant':
				$this->collectUpdateKlant($_REQUEST['Klant_id']);
				break;
				case 'deleteKlant':
				$this->collectDeleteKlant($_REQUEST['Klant_id']);
				break;
				
				case 'createReservering':
				$this->createReservering();
				break;
				case 'collectCreateReservering':
				$this->collectCreateReservering();
				break;
				case 'readsReserveringen':
				$this->collectReadsReserveringen();
				break;
				case 'readReservering':
				$this->collectReadReservering($_REQUEST['reservering_id']);
				break;
				case 'updateReservering':
				$this->collectUpdateReservering($_REQUEST['reservering_id']);
				break;
				case 'deleteReservering':
				$this->collectDeleteReservering($_REQUEST['reservering_id']);
				break;
				default:
				$this->collectHome();
				break;
			}			
		} catch (ValidationException $e) {
			$errors = $e->getErrors();

		}
		
	}
	/*
		stuurt je naar de begin pagina.
	*/
	// landingpage == begin pagina\\
	public function collectHome(){
		include 'view/home.php';
	}
	// eind\\


	/*
		voert de method createKlanten uit in klantenLogic
		stuurt je naar de klantenCreateForm
	*/
	// CRUD klant \\
	public function collectCreateKlant(){
		$this->klantenLogic->createKlanten();		
		include 'view/klantenCreateForm.php';
	}

	/*
		voert de method readsKlanten uit in klantenLogic
		stuurt je naar de klantenOverzicht
	*/
	public function collectReadsKlanten(){
		$results = $this->klantenLogic->readsKlanten();
		include 'view/klantenOverzicht.php';
	}

	/*
		geeft de parameter Klant_id mee 
		voert de method readKlant uit in klantenLogic 
		stuurt je naar de klantUpdateform	
	*/
	public function collectReadKlant($Klant_id){
		$klant = $this->klantenLogic->readKlant($Klant_id);
		include 'view/klantUpdateForm.php';
	}


	/*
		geeft de parameter Klant_id mee
		voert de method updateKlant uit in klantenLogic
		stuurt je terug naar de readsKlanten	
	*/
	public function collectUpdateKlant($Klant_id){
		$this->klantenLogic->updateKlant($Klant_id);
		header("Location: ?op=readsKlanten");
	}

	/*
		geeft parameter Klant_id mee
		voert de method deleteKlant uit in de klantenLogic
		stuurt je terug naar de readsKlanten
	*/
	public function collectDeleteKlant($Klant_id){
		$this->klantenLogic->deleteKlant($Klant_id);
		header("Location: ?op=readsKlanten");
	}
	// eind\\


	// crud reservering \\
	public function createReservering(){		
		$this->reserveringsLogic->createReservering();	
	}

	public function collectCreateReservering(){	
		$klant = $this->klantenLogic->readsKlanten();
		include 'view/reserveringCreateForm.php';
	}

	public function collectReadsReserveringen(){
		$results = $this->reserveringsLogic->readsReserveringen();
		include 'view/reserveringOverzicht.php';
	}

	public function collectReadReservering($reservering_id){
		$reservering = $this->reserveringsLogic->readReservering($reservering_id);
		include 'view/reserveringUpdateForm.php';
	}
	
	public function collectUpdateReservering($reservering_id){
		$this->reserveringsLogic->updateReservering($reservering_id);
		header("Location: ?op=readsReserveringen");
	}		

	public function collectDeleteReservering($reservering_id){
		$this->reserveringsLogic->deleteReservering($reservering_id);
		header("Location: ?op=readsReserveringen");
	}
	// eind \\


	public function __destruct(){

	}

}

?>