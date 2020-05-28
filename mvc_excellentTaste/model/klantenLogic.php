<?php
require_once 'model/DataHandler.php';

class klantenLogic {
	/*
		maakt een nieuwe dataHandler aan
	*/
	public function __construct() {
		$this->DataHandler = new Datahandler('localhost','mysql' ,'excellenttaste' ,'root' ,'');
	}

	/*
		bekijkt of de submit verzonden is
		zet de waarde van naam in $Klantnamen
		zet de waarde van telnr in $Telefoon
		zet de waarde van Email in $Email
		zet de waarde van BOOLEAN in $status
		verstuurt de $sql naar de functie createData in DataHandler
	*/
	public function createKlanten(){		
		if (isset($_POST['formSubmit'])) {
			$Klantnamen = $_POST['naam'];
			$Telefoon = $_POST['telnr'];
			$Email = $_POST['Email'];
			$status = $_POST['BOOLEAN'];

			$sql = "INSERT INTO `klanten`(`Klant_id`, `Klantnamen`, `Telefoon`, `Email`, `status`) VALUES ('','".$Klantnamen."', '".$Telefoon."', '".$Email."', '".$status."');";
			$this->DataHandler->createData($sql);
		}
	}

	/*
		verstuurd de $sql naar readsData in de dataHandler
		zet het resultaat in $results
		returns $results
	*/
	public function readsKlanten(){
		$sql = 'SELECT * FROM klanten';
		$results = $this->DataHandler->readsData($sql); 
		return $results;
	}

	/*
		voert de method readData uit met de mee gegeven parameter $Klant_id
		zet het resultaat in $results 
		fetched results,  zet resultaat in $klant
		returns $klant
	*/
	public function readKlant($Klant_id){
		$sql = 'SELECT * FROM klanten WHERE Klant_id = "'.$Klant_id.'"';
		$results = $this->DataHandler->readData($sql);
		$klant = $results->fetch(PDO::FETCH_ASSOC);
		return $klant;
	}

	/*
		bekijkt of de submit verzonden is
		zet de waarde van naam in $Klantnamen
		zet de waarde van telnr in $Telefoon
		zet de waarde van Email in $Email
		zet de waarde van BOOLEAN in $status
		verstuurt de $sql naar de functie updateData in DataHandler
	*/
	public function updateKlant($Klant_id){
		if (isset($_POST['formSubmit'])) {
			$Klantnamen = $_POST['naam'];
			$Telefoon = $_POST['telnr'];
			$Email = $_POST['Email'];
			$status = $_POST['BOOLEAN'];

			$sql="UPDATE `klanten` SET `Klantnamen`= '".$Klantnamen."',`Telefoon`='".$Telefoon."',`Email`='".$Email."',`status`='".$status."' WHERE Klant_id = '".$Klant_id."'";
		$this->DataHandler->updateData($sql);
		}
	}

	/*
		verstuurd de $sql naar deleteData in de dataHandler
		voert de method deleteData uit met de parameter $sql
	*/
	public function deleteKlant($Klant_id){
		$sql = 'DELETE FROM klanten WHERE Klant_id = ' . $Klant_id;
		$this->DataHandler->deleteData($sql);
	}



	}
