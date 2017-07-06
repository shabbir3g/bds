<?php 


	class BasicData {

		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "bds";

		public $connection ;



		public function __construct(){

			$conn = new mysqli($this -> host, $this -> user, $this -> pass , $this -> db);
 			
 			 $this -> connection = $conn;


		}



		// data insert method 

		public function studentDataInsert($name, $email , $cell, $batch, $uimage,  $imaget  ) {

			$sql = "INSERT INTO student_info (name, email, cell, batch, image) VALUES ('$name','$email','$cell','$batch','$uimage')";
			$data = $this -> connection -> query($sql);

			move_uploaded_file( $imaget , 'images/'.$uimage );

			if($data ){
				return "<h2 style='color:green;'> Data Insert Successfull </h2>";
			}else{
				return "<h2 style='color:orange;'> Data Insert Failed </h2>";
			}

		}

		// data k doira anaar jonnooo 

		public function dataChoillaAsoo(){

			$sql = "SELECT * FROM student_info ORDER BY id DESC";
			$data = $this -> connection -> query($sql);

			if($data){
				return $data;
			}else{
				return false;
			}
		}

		// delete method 

		public function deleteKoiraFalan($id){

			$sql = "DELETE FROM student_info WHERE id='$id'";
			$data  = $this -> connection -> query($sql);

			if($data){
				return true;
			}else{
				return false;
			}
		}


		// Email check 

		public function emailAcheKina($email){
			$sql = " SELECT email FROM student_info WHERE email='$email' ";
			$data = $this -> connection -> query($sql);

			if( $data -> num_rows > 0 ){
				return false;
			}else{
				return true;
			}
		}

		// amar akla jibon 

		public function amarAklaJibon($id){
			$sql = "SELECT * FROM student_info WHERE id='$id'";
			$data = $this -> connection -> query($sql);

			if($data ){
				return $data ;
			}else{
				return false;
			}

		}

		// Profile picture update 

		public function chobiProborton($uimagename, $uimaget, $id ) {
			
			$sql = "UPDATE student_info SET image='$uimagename' WHERE id='$id'";

			$data = $this -> connection -> query($sql);
			move_uploaded_file($uimaget, 'images/'.$uimagename);

			if($data ){
				return "<h2 style='color:green;'> Image Update Successfull </h2>";
			
			}else{
				return "<h2 style='color:red;'> Image Update Failed </h2>";
			}

		}

		// User tottho poriborton 

		public function userTothoPoriborton($name, $email, $cell, $batch, $id ) {

			$sql = "UPDATE student_info SET name='$name' , email='$email' , cell='$cell' , batch='$batch' WHERE id='$id'";

			$data = $this -> connection -> query($sql);

			if($data){
				return "<h2 style='color:green;'> Data Update Successfull </h2>";
			}else{
				return "<h2 style='color:red;'> Data Update Failed </h2>";
			}

		}


	}











?>