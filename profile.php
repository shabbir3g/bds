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

		while( $akla =  $aklajibon -> fetch_assoc() ) :
		?>


	<div class="profile">
		<img src="images/<?php echo  $akla['image']; ?>" alt="">
		<hr>
		<div class="info">
			<table>
				<tr>
					<td>Name :</td>
					<td><?php echo  $akla['name']; ?></td>
				</tr>
				<tr>
					<td>Email :</td>
					<td><?php echo  $akla['email']; ?></td>
				</tr>
				<tr>
					<td>Cell :</td>
					<td><?php echo  $akla['cell']; ?></td>
				</tr>
				<tr>
					<td>Batch :</td>
					<td><?php echo  $akla['batch']; ?></td>
				</tr>
			</table>
		</div>
		<a href="index.php">Back Main page</a>
	</div>
	<?php endwhile; ?>
</body>
</html>