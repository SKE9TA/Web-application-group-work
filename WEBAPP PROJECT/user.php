<?php 
class User  {
	private $fullname;
	private $email;
	private $password;
	
	//Profile Variables
	private $riderName;
	private $nationalId;
	private $bikeVIN;
	private $licenseNo;
	private $residence;

	public function register ($pdo) {
		$hashedPass= password_hash($this->getPassword(), PASSWORD_DEFAULT); 		
		//prepare a statement
		try{
			//prepare a query
			$stm = $pdo->prepare("insert into users (name, email, password) values (?,?,?)");
			$stm->execute([$this->getFullname(),$this->getEmail(),$hashedPass]);
			$stm=null;
			session_start();
			$_SESSION['username']= $this->getEmail();
			header("location: ../users/home.php");
		} catch (PDOException $e) {
			return $e->getMessage();
		}
		//factor out profile pic
	}
	public function login($pdo) {
		$email= $this->getEmail();
		$stm= $pdo->prepare("select * from users where email= ?");
		$stm->execute([$this->getEmail()]);
		$row= $stm->fetch();
		$hashedPass= $row['password'];
		if(password_verify($this->getPassword(), $hashedPass)) {
			session_start();
			$_SESSION['username']= $row['email']; 
			$stm = null;
			return true;
		}
		else {
			$stm = null;
			return false;
			/* echo '
			<script type="text/javascript">
				window.location("1-regform.php");
				window.onload = function(){
					alert("Invalid login");
				};
				</script>';  */
			}
		}

		public function changePassword($pdo) {
			session_start();
			try {
					$hashedPass= password_hash($this->getPassword(), PASSWORD_DEFAULT); 	
					$stm= $pdo->prepare("update users set password= ? where email= ? ");
					$stm->execute([$hashedPass, $_SESSION['username']]);
					$stm= null;
					header("Refresh: 3");
					echo("Password Change Successful");
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}	

		public function logout ($pdo){
			session_unset('username');
			session_destroy();
			header("location: ../index.html");
		}

		public function profile ($pdo) {
			
			try{
				//prepare a query
				$stm = $pdo->prepare("insert into profiles (name,email,national_id,bike_vin,license_no,residence) values (?,?,?,?,?,?) ");
				$stm->execute([$this->getRiderName(),$this->getEmail(),$this->getNationalId(),$this->getBikeVIN(),$this->getLicenseNo(),$this->getResidence()]);
				$stm=null;
				header("location: ../users/profileform.php");
			} catch (PDOException $e) {
				return $e->getMessage();
			}
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
		

		

	

	/**
	 * Get the value of riderName
	 *
	 * @return  	private
	 */
	public function getRiderName()
	{
		return $this->riderName;
	}

	/**
	 * Set the value of riderName
	 *
	 * @param  	private  $riderName
	 *
	 * @return  self
	 */
	public function setRiderName($riderName)
	{
		$this->riderName = $riderName;

		return $this;
	}

	/**
	 * Get the value of nationalId
	 *
	 * @return  	 */
	public function getNationalId()
	{
		return $this->nationalId;
	}

	/**
	 * Set the value of nationalId
	 *
	 * @param   $nationalId
	 *
	 * @return  self
	 */
	public function setNationalId($nationalId)
	{
		$this->nationalId = $nationalId;

		return $this;
	}

	/**
	 * Get the value of bikeVIN
	 *
	 * @return  	 */
	public function getBikeVIN()
	{
		return $this->bikeVIN;
	}

	/**
	 * Set the value of bikeVIN
	 *
	 * @param   $bikeVIN
	 *
	 * @return  self
	 */
	public function setBikeVIN($bikeVIN)
	{
		$this->bikeVIN = $bikeVIN;

		return $this;
	}

	/**
	 * Get the value of licenseNo
	 *
	 * @return  	 */
	public function getLicenseNo()
	{
		return $this->licenseNo;
	}

	/**
	 * Set the value of licenseNo
	 *
	 * @param   $licenseNo
	 *
	 * @return  self
	 */
	public function setLicenseNo($licenseNo)
	{
		$this->licenseNo = $licenseNo;

		return $this;
	}

	/**
	 * Get the value of residence
	 *
	 * @return  	 */
	public function getResidence()
	{
		return $this->residence;
	}

	/**
	 * Set the value of residence
	 *
	 * @param   $residence
	 *
	 * @return  self
	 */
	public function setResidence($residence)
	{
		$this->residence = $residence;

		return $this;
	}
	}
	?>