<?php 

	
		include "functions.php";

		$obj = new BasicData;

		$id = $_GET['id'];

		$data  =  $obj -> deleteKoiraFalan($id);

		header("location:index.php");












?>