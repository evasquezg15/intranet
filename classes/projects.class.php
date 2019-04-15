<?php 
require_once("database.class.php");


class Projects {
    
    public function insertProject($id_client, $id_resp_user, $name, $status, $start_date, $end_date, $development_h, $design_h, $weblayout_h, $information, $requirement, $created_by){

        $db   = new database();
        $conn = $db->conn();

        try {


            if((!empty($id_client)) && (!empty($id_resp_user)) && (!empty($name))){


                $queryInsert = "INSERT INTO projects (id_client, id_resp_user, name, status, start_date, end_date, development_h, design_h, weblayout_h, information, requirements, created_by) VALUES ('".$id_client."','".$id_resp_user."', '".$name."', '".$status."', '".$start_date."', '".$end_date."', '".$development_h."', '".$design_h."', '".$weblayout_h."', '".$information."','".$requirement."','".$created_by."')";
                //die(var_dump($queryInsert));
                $query = $conn->prepare($queryInsert);
                $check = $query->execute();

                if($check=="true"){
                    $rslt=1;
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

    public function updateProject($id_client, $id_resp_user, $name, $status, $start_date, $end_date, $development_h, $design_h, $weblayout_h, $information, $requirement, $created_by, $id_project){

        $db   = new database();
        $conn = $db->conn();

        try {


            if((!empty($id_project)) && (!empty($id_resp_user)) && (!empty($name))){


                $updateProject = "UPDATE projects SET id_client='".$id_client."', id_resp_user='".$id_resp_user."', name='".$name."', status='".$status."', start_date='".$start_date."', end_date='".$end_date."', development_h='".$development_h."', design_h='".$design_h."', weblayout_h='".$weblayout_h."', information='".$information."', requirements='".$requirement."' WHERE id='".$id_project."'";
                $q = $conn->prepare($updateProject);
                $check = $q->execute();

                if($check=="true"){
                    $rslt=1;
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

    public function getProjects(){
        $db   = new database();
        $conn = $db->conn();

        try {

            $sql = "select * from projects order by id desc";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetchAll();      

            require_once("clients.class.php");
            $clients = new clients();

            require_once("users.class.php");
            $users = new users();

            $project_list = array();

            $i=0;

            foreach ($result as $rsl) {

                $client = $clients->getClientById($rsl['id_client']);
                $user = $users->getUserById($rsl['id_resp_user']);

                $project_list[$i]['id'] = "<td><center>".$rsl['id']."</td>";                 
                $project_list[$i]['client'] = "<td><center><a href='index.php?page=verproyecto&id_project=".$rsl['id']."'>".$client['cliente_nombre']."</a></center></td>";                 
                $project_list[$i]['nameProject'] = "<td><center>".$rsl['name']."</center></td>";
                $project_list[$i]['name'] = "<td><center>".$user['name']." ".$user['lastname']."</center></td>";
                $project_list[$i]['status'] = "<td><center>".$rsl['status']."</center></td>";                 
                $project_list[$i]['start_date'] = "<td><center>".$rsl['start_date']."</center></td>";                 
                $project_list[$i]['end_date'] = "<td><center>".$rsl['end_date']."</center></td>";                 
                $project_list[$i]['task_url'] = "<td><center><a href='index.php?page=tareas&id_project=".$rsl['id']."'><button type='button' class='btn btn-primary ladda-button' data-style='expand-left' data-plugin='ladda'><span class='ladda-label'>Tareas</span><span class='ladda-spinner></span></button></a></center></td>";                 
                $project_list[$i]['edit'] = "<td><center><a href='index.php?page=editaproyecto&id_project=".$rsl['id']."'><button type='button' class='btn btn-primary ladda-button' data-style='expand-left' data-plugin='ladda'><span class='ladda-label'>Editar</span><span class='ladda-spinner></span></button></a></center></td>";
                if($rsl['active']==1){
                    $project_list[$i]['est'] = "<td><center><a id='container_".$rsl['id']."'><button type='button' class='btn btn-primary ladda-button estadoBoton' data-style='expand-left' data-plugin='ladda' id='deactivate_".$rsl['id']."'><span class='ladda-label'>Desactivar</span><span class='ladda-spinner></span></button></a></center></td>";                 
                } else {
                    $project_list[$i]['est'] = "<td><center><a id='container_".$rsl['id']."'><button type='button' class='btn btn-primary ladda-button estadoBoton' data-style='expand-left' data-plugin='ladda' id='activate_".$rsl['id']."'><span class='ladda-label'>Activar</span><span class='ladda-spinner></span></button></a></center></td>";
                }
                $i++;
            }


            //die(var_dump($project_list));

            echo json_encode($project_list);


        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function getProjectById($id){
        $db   = new database();
        $conn = $db->conn();

        try {

            $sql = "select * from projects where id='".$id."'";
            $query = $conn->prepare($sql);
            $executed = $query->execute(); 
            $result = $query->fetch();      

            return $result;

        } catch( PDOException $e ) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }



} // end class

?>