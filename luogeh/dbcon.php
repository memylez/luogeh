<?php
		$servername="localhost";
		$username="myles";
		$password="password";
		$dbname="luogeh";
		
		//Create connection
		$conn=mysqli_connect($servername,$username,$password,$dbname);
		//Check connection
		if(!$conn){
			die("Connection failed: ". mysqli_connect_error());
		}
?>