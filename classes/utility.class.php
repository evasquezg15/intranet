<?php 
require_once("database.class.php");
class Utility {
    
    public function deactivate($id, $target){
        $db   = new database();
        $conn = $db->conn();
        
        $update = "UPDATE ".$target." SET active='0' WHERE id='".$id."'";
        $q = $conn->prepare($update);
        $check = $q->execute();

        if($check=="true"){
            echo 1;
        } else {
            echo 0;
        }
    }

    public function activate($id, $target){
        $db   = new database();
        $conn = $db->conn();
        
        $update = "UPDATE ".$target." SET active='1' WHERE id='".$id."'";
        $q = $conn->prepare($update);
        $check = $q->execute();

        if($check=="true"){
            echo 1;
        } else {
            echo 0;
        }
    }

    public function order($current_id, $next_id, $current_order, $next_order, $target){
        $db   = new database();
        $conn = $db->conn();
        try {
            
            $updateFirst = "UPDATE ".$target." SET ord='".$next_order."' WHERE id='".$current_id."'";
            $q = $conn->prepare($updateFirst);
            $q->execute();
        
            $updateSecond = "UPDATE ".$target." SET ord='".$current_order."' WHERE id='".$next_id."'";
            $q = $conn->prepare($updateSecond);
            $q->execute();

        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }

        
        echo "1";   
    }

} // end class

?>