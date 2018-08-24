<?php

require('include/config.php');
//for approver drop down
$sqlforapp="SELECT * FROM `tblapprover`";
$queryforapp=$dbh->prepare($sqlforapp);
$queryforapp->execute();

$resultsforapp=$queryforapp->fetchAll(PDO::FETCH_ASSOC);


//end of

//for form
	if(isset($_POST['submit'])){

		$accdescription=$_POST['accdescription'];
		$acccode=$_POST['acccode'];
		$crnum=$_POST['crnum'];
		
		
		
		$employee=$_SESSION['mail'];
		
		$sql='INSERT INTO `tblwork` (`accountDescription`,`crNumber`,`accountCode`,`employee`) VALUES(?,?,?,?)';
		$query=$dbh->prepare($sql);
		$query->execute(array($accdescription,$crnum,$acccode,$employee));

			if(isset($query)){
				echo'
				<script>
				alert("Work successfuly registered");
				</script>
				';
			$_SESSION['mail']=$_POST['mail'];

			header('location:addTimeToWork.php');
			
			}else{
				echo'
				<script>
				alert("Work registration failed");
				</script>
				';
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

			<label>Account Discription: </label>
				<input type="text" name="accdescription" required><br><br>
	
			<label>Account Code: </label>
				<input type="text" name="acccode" required><br><br>

			<label>CR Number: </label>
				<input type="text" name="crnum" required><br><br>

			<select name="man" required>

				<option value="">---Pick Approver---</option>

				<?php
					foreach($resultsforapp as $re){
					echo '
					<option value="'.$re['email'].'">'.$re['nme'].' '.$re['surname'].'</option>
					';
					}
				?>
			</select><br><br>

			<input type="submit" value="Submit" name="submit">

			<input type="reset">
		</form>

	</body>
</html>