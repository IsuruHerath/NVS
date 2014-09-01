<?php
	class DBConnector{
		
		function getData($query){
		
			$con=mysqli_connect("localhost","root","","Volunteer");
			
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			$result = mysqli_query($con,$query);
			mysqli_close($con);
			$topics = array("year","month","date","income");
			return $result;
		}
	}
?>