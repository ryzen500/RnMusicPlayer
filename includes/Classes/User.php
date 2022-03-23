<?php
	class User {

        // Config
		public $con;
        // Username 
        public $username;

        // public id 
        public  $id;
		public function __construct($con, $username) {
			$this->con = $con;
            $this->username= $username;
        }


        // Username
        public function getUsername(){
            return $this->username;
        }


        // Function  for  get Email Field 

        public function getEmail() {
			$query = mysqli_query($this->con, "SELECT email FROM users WHERE username='$this->username'");
			$row = mysqli_fetch_array($query);
			return $row['email'];
		}

        // firstName And last Name 
        public function getFirstAndLastName() { 
            // query
            $query = mysqli_query($this->con, "SELECT CONCAT(firstName,' ', lastName) as 'name' FROM users WHERE username='$this->username'");

            // visual the data it first 
            $row= mysqli_fetch_array($query);

            return $row['name'];
        }

        public function getId() {
            $query = mysqli_query($this->con, "SELECT id FROM users WHERE username='$this->username'");
			$row = mysqli_fetch_array($query);
			return $row['id'];
        		}

    }
	
?>