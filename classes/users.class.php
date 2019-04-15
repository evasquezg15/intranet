<?php 
require_once("database.class.php");
class Users {
    
   public function getUsers(){
        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select * from users order by id desc";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();      

            $users_list = array();

            $i=0;

            foreach ($result as $rsl) {

                $roles = $this->getRolesByUser($rsl['id']);


                $users_list[$i]['id'] = "<td><center>".$rsl['id']."</td>";                 
                $users_list[$i]['name'] = "<td><center>".$rsl['name']." ".$rsl['lastname']."</center></td>";                 
                $users_list[$i]['email'] = "<td><center>".$rsl['email']."</center></td>";                 
                $users_list[$i]['tel'] = "<td><center>".$rsl['tel']."</center></td>";                 
                $users_list[$i]['rol'] = "<td><center>".$roles."</center></td>";                 
                $users_list[$i]['edit'] = "<td><center><a href='index.php?page=editausuario&user_id=".$rsl['id']."'><button type='button' class='btn btn-primary ladda-button' data-style='expand-left' data-plugin='ladda'><span class='ladda-label'>Editar</span><span class='ladda-spinner></span></button></a></center></td>";
                if($rsl['active']==1){
                    $users_list[$i]['status'] = "<td><center><a id='container_".$rsl['id']."'><button type='button' class='btn btn-primary ladda-button estadoBoton' data-style='expand-left' data-plugin='ladda' id='deactivate_".$rsl['id']."'><span class='ladda-label'>Desactivar</span><span class='ladda-spinner></span></button></a></center></td>";                 
                } else {
                    $users_list[$i]['status'] = "<td><center><a id='container_".$rsl['id']."'><button type='button' class='btn btn-primary ladda-button estadoBoton' data-style='expand-left' data-plugin='ladda' id='activate_".$rsl['id']."'><span class='ladda-label'>Activar</span><span class='ladda-spinner></span></button></a></center></td>";
                }
                $i++;
            }



            echo json_encode($users_list);


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getUserById($id_user){
        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select * from users where id='".$id_user."'";
            
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetch();      

            return $result;


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getRolesByUser($id_user){
        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select roles_mask from users where id='".$id_user."'";
            
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetch();      

            $roles = $result['roles_mask'];

            $sql_roles = "select * from users_roles where id ='".$roles."'";
            $query_rol = $conn->prepare($sql_roles);
            $executed_rol = $query_rol->execute(); 
            $result_rol = $query_rol->fetch();      

            return "<strong>".$result_rol['name']."</strong>";


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getRoles(){
        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select * from users_roles";
            
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();      
            
            return $result;


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getDepartments(){

        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select * from department";
            
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();      
            
            return $result;


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getPages(){
        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select * from pages";
            
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();      
            
            return $result;


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getRolesPages(){
        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select * from rol_pages";
            
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();      
            
            echo json_encode($result);


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getUserInfoById($user_id){
        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select * from users where id='".$user_id."'";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetch();      
            
            return $result;


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getCommercials(){
        $db   = new database();
        $conn = $db->conn();
        try {

            $sql = "select * from users where roles_mask='3' and active='1'";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();      
            
            return $result;


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function updateUser($name, $lastname, $tel, $email, $emergency_contact, $blood_type, $start_date, $finish_date, $contract_type, $position, $roles_mask, $cost_per_hour, $eps, $address, $password, $user_id, $id_department){

        $db   = new database();
        $conn = $db->conn();

        try {


            if(empty($password)){

                $updateUser = "UPDATE users SET name='".$name."', lastname='".$lastname."', tel='".$tel."', email='".$email."', emergency_contact='".$emergency_contact."', blood_type='".$blood_type."', start_date='".$start_date."', finish_date='".$finish_date."', contract_type='".$contract_type."', position='".$position."', roles_mask='".$roles_mask."',cost_per_hour='".$cost_per_hour."', eps= '".$eps."',address='".$address."', id_department='".$id_department."' WHERE id='".$user_id."'";
                $q = $conn->prepare($updateUser);
                $check = $q->execute();

            } else {

                $password = password_hash($password, PASSWORD_DEFAULT);

                $updateUser = "UPDATE users SET name='".$name."', lastname='".$lastname."', tel='".$tel."', email='".$email."', emergency_contact='".$emergency_contact."', blood_type='".$blood_type."', start_date='".$start_date."', finish_date='".$finish_date."', contract_type='".$contract_type."', position='".$position."', roles_mask='".$roles_mask."',cost_per_hour='".$cost_per_hour."', eps= '".$eps."',address='".$address."',password='".$password."', id_department='".$id_department."' WHERE id='".$user_id."'";
                $q = $conn->prepare($updateUser);
                $check = $q->execute();

            }

            
            if($check=="true"){
                $rslt=1;
            } else {
                $rslt=0;
            }

            return $rslt;

        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }


    public function insertUser($name, $lastname, $tel, $email, $emergency_contact, $blood_type, $start_date, $finish_date, $contract_type, $position, $roles_mask, $cost_per_hour, $eps, $address, $password, $id_department){

        $db   = new database();
        $conn = $db->conn();

        try {


            if((!empty($name)) && (!empty($lastname)) && (!empty($tel)) && (!empty($email)) && (!empty($password))){

                $password = password_hash($password, PASSWORD_DEFAULT);
                $active = 1;
                $force_logout = 2;
                $verified = 1;
                $status = 0;
                $last_login = 0;

                $sql_check = "select * from users where email='".$email."'";
                $query_check = $conn->prepare($sql_check);
                $executed_check = $query_check->execute(); 
                $result_check = $query_check->fetch();      

                if(!empty($result_check)){

                    $queryInsert = "INSERT INTO users (name, lastname, email, password, tel, emergency_contact, blood_type, eps, address, start_date, finish_date, contract_type, verified, roles_mask, position, cost_per_hour, last_login, force_logout, active) VALUES ('".$name."','".$lastname."', '".$email."', '".$password."', '".$tel."', '".$emergency_contact."', '".$blood_type."', '".$eps."', '".$address."', '".$start_date."', '".$finish_date."', '".$contract_type."', '".$verified."', '".$roles_mask."', '".$position."', '".$cost_per_hour."', '".$last_login."', '".$force_logout."', '".$active."')";
                    $query = $conn->prepare($queryInsert);
                    $check = $query->execute();

                    if($check=="true"){
                        $rslt=1;
                    } else {
                        $rslt=0;
                    }

                } else {
                    $rslt=0;
                }

            }

            return $rslt;

        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }


    public function setRol($rol, $page, $value){
        $db   = new database();
        $conn = $db->conn();
        
        try {

            if((!empty($rol)) && (!empty($page))){

                if($value=="checked"){

                    $sql = "select * from rol_pages where id_rol='".$rol."' and id_page='".$page."'";
                    $query = $conn->prepare($sql);
                    $executed = $query->execute(); 
                    $result = $query->fetch();

                    if(empty($result)){

                        $insert = "INSERT INTO rol_pages (id_rol, id_page) VALUES ('".$rol."','".$page."')";
                        $query = $conn->prepare($insert);
                        $check = $query->execute();

                        if($check=="true"){
                            echo 1;
                        } 

                    }

                } else {

                    $sql = "DELETE FROM rol_pages WHERE id_rol='".$rol."' and id_page='".$page."'";
                    $q = $conn->prepare($sql);
                    $check = $q->execute();

                }

            }


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }    
    }

} // end class

?>