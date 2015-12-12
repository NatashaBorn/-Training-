<?php
	$mysgli=false; 
	function connectDB(){
		global $mysgli;
		$mysgli=new mysqli("localhost","root","","NewBD");
		$mysgli->query("SET NAMES 'UTF-8'");
	}
	function closeDB(){
		global $mysgli;
		$mysgli->close();
	}
?>