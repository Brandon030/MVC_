<?php
require_once 'model/klantenLogic.php';
require_once 'model/reserveringsLogic.php';
require_once 'model/bestellingsLogic.php';
require_once 'model/menuItemsLogic.php';

class Controller{
	
	public function __construct() {
		$this->klantenLogic = new klantenLogic();
		$this->reserveringsLogic = new reserveringsLogic();   
		$this->bestellingsLogic = new bestellingsLogic();
		$this->menuItemsLogic = new menuItemsLogic();
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
				$this->createKlant();
				break;
				case 'collectCreateKlant':
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
				case 'collectCreateNaamReservering':
				$this->collectCreateNaamReservering();
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

				case 'createBestelling':
				$this->createBestelling($_REQUEST['menuItemCode']);
				break;
				case 'readsBestellingen':
				$this->collectReadsBestellingen($_REQUEST['reservering_id']);
				break;
				case 'readBestelling':
				$this->collectReadsBestelling($_REQUEST['reservering_id']);
				break;
				case 'updateBestelling':
				$this->collectUpdateBestelling($_REQUEST['reservering_id']);
				break;
				case 'DeleteBestelling':
				$this->collectDeleteBestelling();
				break;

				case 'createMenuItem':
				$this->createMenuItem();
				break;
				case 'collectCreateMenuItem':
				$this->collectCreateMenuItem();
				break;
				case 'readsMenuDranken':
				$this->collectReadsDranken();
				break;
				case 'readMenuItem':
				$this->readMenuItem($_REQUEST['menuItemCode']);
				break;
				case 'updateMenuItem':
				$this->updateMenuItem($_REQUEST['menuItemCode']);
				break;
				case 'deleteMenuItem':
				$this->deleteMenuItem($_REQUEST['menuItemCode']);
				break;

				case 'test':
				$this->testpagina();
				break;
				case 'updatePlus':
				$this->updatePlus2($_REQUEST['nummer']);
				break;
				case 'updateMin':
				$this->updateMin2($_REQUEST['nummer']);
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
		public function createKlant(){
			$this->klantenLogic->createKlanten();		
			return header("Location: ?op=readsKlanten");
		}

	/*

	*/
		public function collectCreateKlant(){	
			$klant = $this->klantenLogic->createKlanten();
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
			return header("Location: ?op=readsreserveringen");	
		}

		public function collectCreateReservering(){	
			$klant = $this->klantenLogic->readsKlanten();
			include 'view/reserveringCreateForm.php';
		}

		public function collectCreateNaamReservering(){	
			$klant = $this->klantenLogic->readsCreatedKlantNaam();
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

	// crud bestellingen \\
		public function createBestelling($mic){	
			$reservering_id = $_REQUEST['reservering_id'];
			$menuItem = $this->menuItemsLogic->readMenuItem($mic);
			$this->bestellingsLogic->createBestelling($menuItem,$reservering_id);
			header("Location: ?op=readsBestellingen&reservering_id='".$reservering_id."'");
		}

		public function collectReadsBestellingen($reservering_id){
			$results = $this->bestellingsLogic->readsBestellingen($reservering_id);
			$results2 = $this->menuItemsLogic->readsMenuItems();
			include 'view/bestellingOverzicht.php';
		}

		public function collectReadBestelling($reservering_id){
			$bestelling = $this->bestellingsLogic->readBestellingen($reservering_id);
			include 'view/bestellingUpdateForm.php';
		}

		public function collectUpdateBestelling($bestelling_id){
			$this->bestellingsLogic->updateBestelling($bestelling_id);
			header("Location: ?op=readsBestellingen");
		}		

		public function collectDeleteBestelling($bestelling_id){
			$this->bestellingsLogic->DeleteBestelling($bestelling_id);
			header("Location: ?op=readsBestellingen");
		}
	// eind \\


	// CRUD MenuItems \\
		public function createMenuItem(){		
			$this->menuItemsLogic->createMenuItem();
			return header("Location: ?op=readsMenuItems");	
		}

		public function collectCreateMenuItem(){	
			$menuItem = $this->menuItemsLogic->readsMenuItems();
			include 'view/MenuItemCreateForm.php';
		}

		public function collectReadsDranken(){
			$menuItem = $this->menuItemsLogic->readsMenuDranken();
			include 'view/menuItemsOverzicht.php';
		}

		public function readMenuItem($menuItemCode){
			$item = $this->menuItemsLogic->readMenuItem($menuItemCode);
			include 'view/menuItemUpdateForm.php';
		}

		public function updateMenuItem($menuItemCode){
			$this->menuItemsLogic->updateMenuItem($menuItemCode);
			header("Location: ?op=readsMenuItems");
		}		

		public function deleteMenuItem($menuItemCode){
			$this->menuItemsLogic->deleteMenuItem($menuItemCode);
			return header("Location: ?op=readsMenuItems");
		}
	// eind \\

		public function testpagina(){
			$result = $this->menuItemsLogic->test();
			include 'view/test.php';
		}

		public function updatePlus2($nummer){
			$this->menuItemsLogic->updatePlus3($nummer);
			return header("Location: ?op=test");
		}

		public function updateMin2($nummer){
			$this->menuItemsLogic->updateMin3($nummer);
			return header("Location: ?op=test");
		}

		public function __destruct(){

		}

	}

	?>