<?php

require('../include/config.php');

//for manager
$sqlforman=" SELECT * FROM `tblmanager`";
$queryforman=$dbh->prepare($sqlforman);
$queryforman->execute();
$resultsforman=$queryforman->fetchAll(PDO::FETCH_ASSOC);

//for approver
$sqlforapp=" SELECT * FROM `tblapprover`";
$queryforapp=$dbh->prepare($sqlforapp);
$queryforapp->execute();
$resultsforapp=$queryforapp->fetchAll(PDO::FETCH_ASSOC);



if(isset($_POST['submit'])){

$nme=$_POST['nme'];
$mname=$_POST['mname'];
$sname=$_POST['sname'];
$empno=$_POST['empno'];
$posit=$_POST['posit'];
$depar=$_POST['depar'];
$mail=$_POST['mail'];
$man=$_POST['man'];
$approver=$_POST['approver'];
$password=$_POST['password'];

$sql='INSERT INTO `tblemployees`(`email`,`nme`,`othrNme`,`surname`,`Position`,`empno`,`departmnt`,`manager`,`approver`,`password`) VALUES(?,?,?,?,?,?,?,?,?,?)';
$query=$dbh->prepare($sql);
$query->execute(array($mail,$nme,$mname,$sname,$posit,$empno,$depar,$man,$approver,$password));

if($query){

echo'
<script>
alert("Employee Added");
</script>
';

}else{

echo'
<script>
alert("Failled");
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
<form method="post">

<h3>Employee Details</h3>
<label>Name: </label>
<input type="text" name="nme" required><br><br>

<label>Middle name: </label>
<input type="text" name="mname"><br><br>

<label>Surname: </label>
<input type="text" name="sname" required><br><br>

<label>Email: </label>
<input type="text" name="mail" required><br><br>

<label>Password: </label>
<input type="password" name="password" required><br><br>

<label>Employee number: </label>
<input type="text" name="empno" required><br><br>

<label>Position: </label>
<input type="text" name="posit" required><br><br>

<label>Department: </label>
<input type="text" name="depar" required><br><br>



<h3>Manager</h3>

<select name="man" required>
<option value="">---Pick Manager---</option>
<?php
foreach($resultsforman as $re){
	echo '
	<option value="'.$re['email'].'">'.$re['nme'].' '.$re['surnme'].'</option>
	';
}
?>

</select>

<h3>Approver</h3>

<select name="approver" required>
<option value="">---Pick Approver---</option>
<?php
foreach($resultsforapp as $re){
	echo '
	<option value="'.$re['email'].'">'.$re['nme'].' '.$re['surname'].'</option>
	';
}
?>
</select>
<br><br>
<input type="submit" value="Submit" name="submit">
<input type="reset">

</form>
</body>
</html>