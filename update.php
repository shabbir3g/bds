<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="ppp">
	
	<?php 

		include "functions.php";

		$obj = new BasicData;

		$id = $_GET['id'];

		$aklajibon = $obj -> amarAklaJibon($id);


		if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == "POST" ){

				$uimage = $_FILES['uimage']['name'];
				$uimaget = $_FILES['uimage']['tmp_name'];

				$exp 		= explode('.', $uimage);
				$ext 		= 	strtolower(end($exp ));

				$format 	= array('jpg','png','gif','jpeg');

				$uimagename 	= md5(time().$uimage).".".$ext ;

				if( empty($uimage) ){
					$imgmess =  "<h2 style='color:red;'> Select a Image First </h2>";
				}elseif( in_array($ext, $format) == false ){
					$imgmess =  "<h2 style='color:red;'> Image format is invalid </h2>";
				}else{

					$obj  -> chobiProborton($uimagename, $uimaget, $id );
				}
			}



			if( isset($_POST['submit2']) AND $_SERVER['REQUEST_METHOD'] == "POST" ){

				$name = $_POST['name'];
				$email = $_POST['email'];
				$cell = $_POST['cell'];
				$batch = $_POST['batch'];


				if( empty($name) || empty($email) || empty($cell) || empty($batch)){
					$datamess =  "<h2 style='color:red;'> Field Must Not be Empty  </h2>";
				}elseif( filter_var( $email , FILTER_VALIDATE_EMAIL ) == false ){

					$datamess =  "<h2 style='color:red;'> Invalid Email Address  </h2>";
				}else{

					$obj -> userTothoPoriborton($name, $email, $cell, $batch, $id  );
				}

			}

		

		while( $akla =  $aklajibon -> fetch_assoc() ) :
		





		?>


	<div class="profile">
		<?php 
		if( isset($imgmess) ){
			echo $imgmess; 
		}

		if( isset($datamess ) ){
			echo $datamess ; 
		}
		 


		?>
		<img src="images/<?php echo  $akla['image']; ?>" alt="">
		<div class="pro">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo  $akla['id']; ?>" method="POST" enctype="multipart/form-data">
				<input name="uimage" type="file" >
				<input type="submit" name="submit" value="Update Profile Picture">
			</form>
		</div>
		<hr>
		<div class="info">
			<table>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo  $akla['id']; ?>" method="POST">
					<tr>
						<td>Name :</td>
						<td><input name="name" type="text" value="<?php echo  $akla['name']; ?>"></td>
					</tr>
					<tr>
						<td>Email :</td>
						<td><input name="email" type="text" value="<?php echo  $akla['email']; ?>"></td>
					</tr>
					<tr>
						<td>Cell :</td>
						<td><input name="cell" type="text" value="<?php echo  $akla['cell']; ?>"></td>
					</tr>
					<tr>
						<td>Batch :</td>
						<td><input name="batch" type="text" value="<?php echo  $akla['batch']; ?>"></td>
					</tr>

					<tr>
						<td></td>
						<td><input name="submit2" type="submit" value="Update Data"></td>
					</tr>
				</form>
			</table>
		</div>
		<a href="index.php">Back Main page</a>
	</div>
	<?php endwhile; ?>
</body>
</html>