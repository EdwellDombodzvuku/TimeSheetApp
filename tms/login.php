<?php
require('include/config.php');

	if(isset($_POST['submit'])){

		$mail=$_POST['mail'];
		$password=$_POST['password'];

		$sql='SELECT `email`,`password` FROM `tblemployees` WHERE email=? AND password=?';
		$query=$dbh->prepare($sql);
		$query->execute(array($mail,$password));


		if($query->Rowcount()>0){

			echo'
			<script>
			alert("Welcome!!!");
			</script>';

			$_SESSION['mail']=$_POST['mail'];

			header('location:welcome.php');

		}else{

			echo'
			<script>
			alert("Password/Email mismatch");
			</script>';

		}

	}

?>

<!doctype html>
<html>
	<head>
	
		<title></title>
		
	</head>

	<body>

		<form action="" method="post">
			<label>Email: </label>
				<input type="email" name="mail" required><br><br>
			<label>Password: </label>
				<input type="password" name="password" required><br><br>
			<input type="submit" name="submit" value="Submit" align=center>

		</form>

	</body>
</html>
