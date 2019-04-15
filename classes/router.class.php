<?php 
require_once("database.class.php");
class Router {
    
   public function getFileByPage($page_name, $auth_roles){
        $db   = new database();
        $conn = $db->conn();
        try {

            //Valida si el usuario tiene permisos en la tabla rol_pages para poder ver la página según el o los roles que tenga

            $sql_check = "select * from rol_pages where id_rol in (".$auth_roles.")";
            $query_check = $conn->prepare($sql_check);
            $executed_check = $query_check->execute(); 
            $result_check = $query_check->fetchAll();      

            //die(var_dump($result_check));

            $values = array();

            foreach ($result_check as $rslt) {
                array_push($values, $rslt['id_page']);
            }

            $pages_id = implode(",", $values);
            
            $sql = "select id, file from pages where name='".$page_name."' and id in (".$pages_id.")";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetch();  

            if(empty($result)){
                $result['file']="views/404.php";    
            }
            
            return $result['file'];

        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getMenu($auth_roles){
        $db   = new database();
        $conn = $db->conn();
        try {

            //Valida si el usuario tiene permisos en la tabla rol_pages para poder ver la página según el o los roles que tenga

            $sql_check = "select * from rol_pages where id_rol in (".$auth_roles.")";
            $query_check = $conn->prepare($sql_check);
            $executed_check = $query_check->execute(); 
            $result_check = $query_check->fetchAll();      

            //die(var_dump($result_check));

            $values = array();

            foreach ($result_check as $rslt) {
                array_push($values, $rslt['id_page']);
            }

            $pages_id = implode(",", $values);
            
            $sql = "select * from pages where id in (".$pages_id.") and main_menu='1' order by ord";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();  
            
            return $result;

        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }



} // end class

?>