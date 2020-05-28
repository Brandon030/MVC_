<?php

/*
	de class dataHandler maakt een database connectie aan en bekijkt of je verbonden bent
	maakt methods aan die een query uitvoeren met de bij behoorde sql
*/
class DataHandler{
	private $host;
	private $dbdriver;
	private $dbname;
	private $username;
	private $password;

	public function __construct($host, $dbdriver, $dbname, $username, $password)
	{
		$this->host = $host;
		$this->dbdriver = $dbdriver;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;

		try {
			$this->dbh = new PDO("$this->dbdriver:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return true;
		} catch (PDOException $e) {
			echo "Connection with ".$this->dbdriver." failed: ".$e->getMessage();
		}
	}

	public function __destruct()
	{
		$this->dbh = null;
	}

	/*
		voert de sql query createData die in de $sql staat op de database
	*/
	public function createData($sql){
		$this->dbh->query($sql);
	}

	/*
		voert de sql query readsData die in de $sql staat op de database
	*/
	public function readsData($sql){
		return $this->dbh->query($sql);
	}

	/*
		voert de sql query readData die in de $sql staat op de database
	*/
	public function readData($sql){
		return $this->dbh->query($sql);
	}

	/*
		voert de sql query updateData die in de $sql staat op de database
	*/
	public function updateData($sql){
		$this->dbh->query($sql);
	}
	
	/*
		voert de sql query deleteData die in de $sql staat op de database
	*/
	public function deleteData($sql){
		$this->dbh->query($sql);
	}
}
?>
