<?php 
include_once '../classes/db.php';
include_once '../classes/user.php';

// session_start();

if(isset($_POST['register'])) {
	$fullname= $_POST['name'];
	$email= $_POST['email'];
	$password= $_POST['password'];

	$con= new DBConnector();
	$pdo = $con->connectToDB();
	
	$user= new User();
	//set member variable
	$user->setFullname($fullname);
	$user->setEmail($email);
	$user->setPassword($password);

	echo $user->register($pdo);
}

if (isset($_POST['login'])) {
    $email= $_POST['email'];
    $password= $_POST['password'];

    $con= new DBConnector();
    $pdo = $con->connectToDB();
    $user= new User();


    $user->setEmail($email);
    $user->setPassword($password);

    if($user->login($pdo)) {
		var_dump($_SESSION['username']);
		if($_SESSION['username'] ==  "admin@test.com") {
			header("location: ../admin/home.php");
		}
		else {
    header("location: ../users/home.php");
}
	}
	else {
		header("location: ../index1.html");
	}
}

if(isset($_POST['logout'])) {
	$pdo= new DBConnector();
	$user= new User();
	$user->logout($pdo);
}

if(isset($_POST['changepassword'])) {
	$newpass= $_POST['newpassword'];

	$con= new DBConnector();
	$pdo = $con->connectToDB();
	$user= new User();	

	$user->setPassword($newpass);
	$user->changePassword($pdo);

}

?>