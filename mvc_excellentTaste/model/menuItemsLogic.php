<?php
require_once 'model/DataHandler.php';

class menuItemsLogic{

    public function __construct() {
        $this->DataHandler = new Datahandler('localhost','mysql' ,'excellenttaste' ,'root' ,'');
    }

    public function createMenuItem(){
        if(isset($_POST['form-submitted'])){

            $mic = $_POST['menuitemcode'];
            $naam = $_POST['menuitemnaam'];
            $prijs = $_POST['prijs'];
            $sgc = $_POST['subgerechtcode'];

            $sql = "INSERT INTO menuitems(`menuItemCode`, `menuItemNaam`, `prijs`, `subGerechtCode`) VALUES
            ('".$mic."','".$naam."','".$prijs."', '".$sgc."')";
            $this->DataHandler->createData($sql); 

        }
    }

    public function readsMenuDranken(){
        $sql = "SELECT * FROM `menuitems` WHERE `subGerechtCode` = 'alho' OR `subGerechtCode` = 'frdr' OR `subGerechtCode` = 'wadr'";
        $menuItem = $this->DataHandler->readsData($sql); 
        return $menuItem;
    }

    public function readsMenuItems(){
        $sql = "SELECT * FROM `menuitems`";
        $menuItem = $this->DataHandler->readsData($sql); 
        return $menuItem;
    }

    public function readMenuItem($menuItemCode){
        $sql = 'SELECT * FROM menuitems WHERE menuItemCode = "'.$menuItemCode.'"';
        $results = $this->DataHandler->readData($sql);
        $item = $results->fetch(PDO::FETCH_ASSOC);
        return $item;
    }

    public function updateMenuItem($menuItemCode){
        if(isset($_POST['form-submitted'])){

            $mic = $_POST['menuitemcode'];
            $naam = $_POST['menuitemnaam'];
            $prijs = $_POST['prijs'];
            $sgc = $_POST['subgerechtcode'];

            $sql="UPDATE `menuitems` SET `menuItemCode`='".$mic."',`menuItemNaam`='".$naam."',`prijs`='".$prijs."',`subGerechtCode`='".$sgc."' WHERE menuItemCode='".$menuItemCode."'";
            $this->DataHandler->createData($sql); 

        }
    }

    public function deleteMenuItem($menuItemCode){
        $sql = 'DELETE FROM menuitems WHERE menuItemCode = "'.$menuItemCode.'"';
        $results = $this->DataHandler->deleteData($sql);
    }   
    
}