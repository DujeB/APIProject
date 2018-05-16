<?php
Class dbObj{
	/* Database connection start */
	var $servername = "localhost";
	var $username = "21607864";
	var $password = "mysqluser";
	var $dbname = "db3_21607864";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}

?>