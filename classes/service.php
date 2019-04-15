<?php
session_start();
ini_set('display_errors', -1);
ini_set('display_startup_errors', 0);
error_reporting(0);
//set_time_limit (300);
if($_SESSION["auth_logged_in"]=="true"){
    require("../config/config.php");
    $_input_post = filter_input_array(INPUT_POST);
    $_input_get = filter_input_array(INPUT_GET);
    if (isset($_input_get["task"])) {
        $task = $_input_get["task"];
    } else {
        $task = $_input_post["task"];
    }
    switch ($task) {

        case 'setRol':
            require("users.class.php");
            $users = new Users();
            $rol = $_input_post['rol'];
            $page = $_input_post['page'];
            $value = $_input_post['value'];
            $users = $users->setRol($rol, $page, $value);
        break;
        
        case 'getUsers':
            require("users.class.php");
            $users = new Users();
            $users = $users->getUsers();
            echo $users;
        break;

        case 'getProjects':
            require("projects.class.php");
            $projects = new Projects();
            $projects = $projects->getProjects();
            echo $projects;
        break;

        case 'getTasksByProjectId':
            require("tasks.class.php");
            $id_project = $_input_post['id_project'];
            $tasks = new Tasks();
            $tasks = $tasks->getTasksByProjectId($id_project);
            echo $tasks;
        break;

        case 'getRolesPages':
            require("users.class.php");
            $users = new Users();
            $rolesPages = $users->getRolesPages();
            echo $rolesPages;
        break;

        case 'updateUser':
            require("users.class.php");
            require("../config/config.php");
            $users = new Users();

            $name = $_input_post['name'];
            $lastname = $_input_post['lastname'];
            $tel = $_input_post['tel'];
            $email = $_input_post['email'];
            $emergency_contact = $_input_post['emergency_contact'];
            $blood_type = $_input_post['blood_type'];
            $start_date = $_input_post['start_date'];
            $finish_date = $_input_post['finish_date'];
            $contract_type = $_input_post['contract_type'];
            $position = $_input_post['position'];
            $roles_mask = $_input_post['roles_mask'];
            $cost_per_hour = $_input_post['cost_per_hour'];
            $eps = $_input_post['eps'];
            $address = $_input_post['address'];
            $password = $_input_post['password'];
            $id_department = $_input_post['id_department'];
            $user_id = $_input_post['user_id'];

            $updateUser = $users->updateUser($name, $lastname, $tel, $email, $emergency_contact, $blood_type, $start_date, $finish_date, $contract_type, $position, $roles_mask, $cost_per_hour, $eps, $address, $password, $user_id, $id_department);
            if($updateUser==1){
                echo "<script>window.location.href='"._DOMAIN."index.php?page=editausuario&user_id=".$user_id."&success=1'</script>";            
            } else {
                echo "<script>window.location.href='"._DOMAIN."index.php?page=editausuario&user_id=".$user_id."&success=0'</script>";            
            }
        break;

        case 'insertUser':
            require("users.class.php");
            require("../config/config.php");
            $users = new Users();

            $name = $_input_post['name'];
            $lastname = $_input_post['lastname'];
            $tel = $_input_post['tel'];
            $email = $_input_post['email'];
            $emergency_contact = $_input_post['emergency_contact'];
            $blood_type = $_input_post['blood_type'];
            $start_date = $_input_post['start_date'];
            $finish_date = $_input_post['finish_date'];
            $contract_type = $_input_post['contract_type'];
            $position = $_input_post['position'];
            $roles_mask = $_input_post['roles_mask'];
            $cost_per_hour = $_input_post['cost_per_hour'];
            $eps = $_input_post['eps'];
            $address = $_input_post['address'];
            $password = $_input_post['password'];
            $id_department = $_input_post['id_department'];
            
            $updateUser = $users->insertUser($name, $lastname, $tel, $email, $emergency_contact, $blood_type, $start_date, $finish_date, $contract_type, $position, $roles_mask, $cost_per_hour, $eps, $address, $password, $id_department);
            
            if($updateUser==1){
                echo "<script>window.location.href='"._DOMAIN."index.php?page=usuarios&success=1'</script>";            
            } else {
                echo "<script>window.location.href='"._DOMAIN."index.php?page=usuarios&success=0'</script>";            
            }
        break;

        case 'deactivate':
            require("utility.class.php");
            $id = $_input_post['id'];
            $target = $_input_post['target'];

            $utility = new Utility();
            $utility->deactivate($id, $target);
            break;
        case 'activate':
            require("utility.class.php");
            $id = $_input_post['id'];
            $target = $_input_post['target'];

            $utility = new Utility();
            $utility->activate($id, $target);
            break;

        case 'insertProject':
            require("projects.class.php");
            $projects = new Projects();
            $name = $_input_post['name'];
            $id_client = $_input_post['id_client'];
            $id_resp_user = $_input_post['id_resp_user'];
            $status = $_input_post['status'];
            $start_date = $_input_post['start_date'];
            $end_date = $_input_post['end_date'];
            $created_by = $_input_post['created_by'];

            $development_h = $_input_post['development_h'];
            $design_h = $_input_post['design_h'];
            $weblayout_h = $_input_post['weblayout_h'];

            $information = $_input_post['information'];
            $requirement = $_input_post['requirement'];

            $check = $projects->insertProject($id_client, $id_resp_user, $name, $status, $start_date, $end_date, $development_h, $design_h, $weblayout_h, $information, $requirement, $created_by);

            if($check==1){
                echo "<script>window.location.href='index.php?page=proyectos&success=1'</script>";            
            } else {
                echo "<script>window.location.href='index.php?page=proyectos&success=0'</script>";            
            }

            break;

        case 'updateProject':
            require("projects.class.php");
            $projects = new Projects();
            $id_project = $_input_post['id_project'];
            $name = $_input_post['name'];
            $id_client = $_input_post['id_client'];
            $id_resp_user = $_input_post['id_resp_user'];
            $status = $_input_post['status'];
            $start_date = $_input_post['start_date'];
            $end_date = $_input_post['end_date'];
            $created_by = $_input_post['created_by'];

            $development_h = $_input_post['development_h'];
            $design_h = $_input_post['design_h'];
            $weblayout_h = $_input_post['weblayout_h'];

            $information = $_input_post['information'];
            $requirement = $_input_post['requirement'];

            $check = $projects->updateProject($id_client, $id_resp_user, $name, $status, $start_date, $end_date, $development_h, $design_h, $weblayout_h, $information, $requirement, $created_by, $id_project);

            if($check==1){
                echo "<script>window.location.href='../index.php?page=editaproyecto&id_project=".$id_project."&success=1'</script>";            
            } else {
                echo "<script>window.location.href='../index.php?page=editaproyecto&id_project=".$id_project."&success=0'</script>";            
            }

            break;
        
        default:
            echo "No especifico ID";
            break;
    }      

} else {
    echo "Lo siento querido amigo, pero no te has logueado :)";
}      