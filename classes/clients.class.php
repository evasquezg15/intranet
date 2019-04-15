<?php 
require_once("database.class.php");
class Clients {
    
   public function getClients(){
        $db   = new database();
        $conn = $db->connIntranetAnt();
        try {

            $sql = "select * from clientes order by cliente_id desc";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();      

            return $result;

        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getClientById($id){
        $db   = new database();
        $conn = $db->connIntranetAnt();
        try {

            $sql = "select * from clientes where cliente_id='".$id."'";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetch();      

            return $result;

        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

}