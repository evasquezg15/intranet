<?php 
session_start();
error_reporting(0);
require("config/config.php");
require("classes/database.class.php");
require("classes/router.class.php");

$db = new Database();
$db = $db->conn();

//$db = new \PDO('mysql:dbname=db_intranet_paxzu;host=localhost;charset=utf8mb4', 'alfredo', '1q2w3e4r5T');
require __DIR__.'/vendor/autoload.php';
$auth = new \Delight\Auth\Auth($db);
$validation = $auth->isLoggedIn();

if($validation=="true"){

	if(empty($_REQUEST['page'])){
		$page_name='dashboard';
		$router = new Router();
		$file = $router->getFileByPage($page_name, $_SESSION['auth_roles']);
		$mainMenu = $router->getMenu($_SESSION['auth_roles']);
		include("views/header.php");
		include($file);
		include("views/footer.php");
	} else {
		$page_name=$_REQUEST['page'];
		$router = new Router();
		$file = $router->getFileByPage($page_name, $_SESSION['auth_roles']);
		$mainMenu = $router->getMenu($_SESSION['auth_roles']);
		include("views/header.php");
		include($file);
		include("views/footer.php");
	}

} else { 

	$user = $_POST[$_SESSION['name']];
	$pass = $_POST[$_SESSION['pass']];

	if(!empty($user) && !empty($pass)){

			try {
				if (!empty($user)) {
					$rememberDuration = null;
					$auth->login($user, $pass, $rememberDuration);
					$validation = $auth->isLoggedIn();
					if($validation=="true"){
						$router = new Router();
						$file = $router->getFileByPage($page_name, $_SESSION['auth_roles']);
						$mainMenu = $router->getMenu($_SESSION['auth_roles']);
						include("views/header.php");
						include("views/dashboard.php");
						include("views/footer.php");
						
					} 
					
				} 
			}

			catch (\Delight\Auth\InvalidEmailException $e) {
				return 'wrong email address';
			}
			catch (\Delight\Auth\UnknownUsernameException $e) {
				return 'unknown username';
			}
			catch (\Delight\Auth\AmbiguousUsernameException $e) {
				return 'ambiguous username';
			}
			catch (\Delight\Auth\InvalidPasswordException $e) {
				$_SESSION['failed_password']=1;
				include("views/login.php");
			}
			catch (\Delight\Auth\EmailNotVerifiedException $e) {
				return 'email address not verified';
			}
			catch (\Delight\Auth\TooManyRequestsException $e) {
				return 'too many requests';
			}

		
	} else {
		include("views/login.php");
	}

}
?>