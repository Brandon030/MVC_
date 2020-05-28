<?php
require_once 'model/DataHandler.php';

class reserveringsLogic {

	public function __construct() {
		$this->DataHandler = new Datahandler('localhost','mysql' ,'excellenttaste' ,'root' ,'');
	}

	public function createReservering(){
		if (isset($_POST['formSubmit'])) {
			$Klantnamen = $_POST['naam'];
			$tafel = $_POST['tafel'];
			$datum = $_POST['datum'];
			$tijd = $_POST['tijd'];
			$aantal_k = $_POST['aantal_k'];
			$aantal = $_POST['aantal'];
			$status = $_POST['BOOLEAN'];

			$sql = "INSERT INTO `reserveringen`(`reservering_id`, `Klantnamen`, `tafel`, `datum`, `tijd`, `aantal_k`, `aantal`, `status`, `Klant_id`) VALUES ('','".$Klantnamen."', '".$tafel."', '".$datum."', '".$tijd."','".$aantal_k."', '".$aantal."', '".$status."', '');";
			$this->DataHandler->createData($sql);
		}
	}

	public function readsReserveringen(){
		$sql = 'SELECT * FROM `reserveringen` INNER JOIN klanten on `reserveringen`.`Klant_id` = `Klanten`.`Klant_id`';
		$results = $this->DataHandler->readsData($sql);
		$reserveringen = $results->fetchall(PDO::FETCH_ASSOC);
		return $reserveringen;
	}

	public function readReservering($reservering_id){
		$sql = 'SELECT * FROM `reserveringen` INNER JOIN klanten on `reserveringen`.`klant_id` = `klanten`.`Klant_id` WHERE `reserveringen`.`klant_id` = "'.$reservering_id.'"';
		$results = $this->DataHandler->readData($sql);
		$reserveringen = $results->fetch(PDO::FETCH_ASSOC);
		return $reserveringen;
	}

	public function updateReservering($reservering_id){
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

	public function deleteReservering($reservering_id){
		$sql = 'DELETE FROM reserveringen WHERE reservering_id = ' . $reservering_id;
		$results = $this->DataHandler->deleteData($sql);
	}



}
