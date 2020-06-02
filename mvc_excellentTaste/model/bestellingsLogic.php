<?php
require_once 'model/DataHandler.php';

class bestellingsLogic {

	public function __construct() {
		$this->DataHandler = new Datahandler('localhost','mysql' ,'excellenttaste' ,'root' ,'');
	}

	public function createBestelling($menuItem, $reservering_id){

			$sql = "INSERT INTO `bestellingen`(`bestelling_id`, `tafel`, `datum`, `tijd`, `menuItemCode`, `aantal`, `prijs`, `reservering_id`) VALUES ('', 2, CURRENT_DATE, CURRENT_TIME,'".$menuItem['menuItemCode']."', 1, '".$menuItem['prijs']."', '".$reservering_id."')";
			$this->DataHandler->createData($sql);
	}

	public function readsBestellingen($reservering_id){
		$sql = "SELECT bestellingen.`tafel`, bestellingen.`bestelling_id`, bestellingen.`reservering_id`, bestellingen.`menuItemCode` AS menuCodeBestelling, bestellingen.`aantal`, bestellingen.`prijs` AS bestelPrijs, menuitems.`menuItemCode`, menuitems.`menuItemNaam` AS `menuNaam`, menuitems.`prijs` AS `menuPrijs`, menuitems.`subGerechtCode` FROM bestellingen
		LEFT JOIN menuitems ON bestellingen. `menuItemCode` = menuitems.`menuItemCode` WHERE reservering_id = '".$reservering_id."'";

		
		$results = $this->DataHandler->readsData($sql);
		$bestellingen = $results->fetchall(PDO::FETCH_ASSOC);
		return $bestellingen;
	}

	// public function readsBestellingen(){
		// $sql = 'SELECT * FROM `reserveringen` INNER JOIN klanten on `reserveringen`.`klant_id` = `klanten`.`Klant_id` WHERE `reserveringen`.`klant_id` = "'.$reservering_id.'"';
		// $results = $this->DataHandler->readData($sql);
		// $reserveringen = $results->fetch(PDO::FETCH_ASSOC);
		// return $reserveringen;
	// }

	public function updateBestelling($bestelling_id){
		if (isset($_POST['formSubmit'])) {
			$Klantnamen = $_POST['naam'];
			$tafel = $_POST['tafel'];
			$datum = $_POST['datum'];
			$tijd = $_POST['tijd'];
			$aantal_k = $_POST['aantal_k'];
			$aantal = $_POST['aantal'];
			$status = $_POST['BOOLEAN'];

			$sql="UPDATE `reserveringen` SET `Klantnamen`= '".$Klantnamen."',`tafel`='".$tafel."',`datum`='".$datum."',`tijd`='".$tijd."', `aantal_k`='".$aantal_k."',`aantal`='".$aantal."', `status`='".$status."' WHERE reservering_id = '".$reservering_id."'";
			$this->DataHandler->updateData($sql);
		}
	}

	public function deleteBestelling($bestelling_id){
		$sql = 'DELETE FROM bestellingen WHERE bestelling_id = ' . $bestelling_id;
		$results = $this->DataHandler->deleteData($sql);
	}



}
