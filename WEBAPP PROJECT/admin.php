
<?php

include 'user.php';
include 'db.php';

class Admin
{
	public function readRiders($pdo)
	{
		// if($_SESSION['username'] !=  "admin@test.com") {
		// 	header("location: ../index.html");
		// }
		try {
			$stm = $pdo->prepare("select * from profiles");
			$stm->execute();
			$rows = $stm->fetchAll();
			var_dump($rows);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function approve($pdo) 
	{
		session_start();
		if($_SESSION['username'] !=  "admin@test.com") {
			header("location: ../index.html");
		}
		try {
			$hashedPass = password_hash($this->getPassword(), PASSWORD_DEFAULT);
			$stm = $pdo->prepare("update users set password= ? where email= ? ");
			$stm->execute([$hashedPass, $_SESSION['username']]);
			$stm = null;
			header("Refresh: 3");
			echo ("Password Change Successful");
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function logout($pdo)
	{
		session_unset('username');
		session_destroy();
		header("location: ../index.html");
	}

	public function getFullname()
	{
		return $this->fullname;
	}

	public function setFullname($fullname)
	{
		$this->fullname = $fullname;

		return $this;
	}


	public function getEmail()
	{
		return $this->email;
	}


	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}


	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}
}
?>