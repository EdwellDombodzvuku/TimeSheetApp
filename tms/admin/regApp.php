<?php

require('../include/config.php');

if(isset($_POST['submit'])){

$app=$_POST['app'];
$sname=$_POST['sname'];
$nme=$_POST['nme'];
$mname=$_POST['mname'];
$mail=$_POST['mail'];

if($app=Approver){
$sql='INSERT INTO `tblapprover` (`nme`,`surname`,`othrNme`,`email`) VALUE(?,?,?,?)';
}else{
$sql='INSERT INTO `tblmanager` (`nme`,`surnme`,`othernme`,`email`) VALUE(?,?,?,?)';
}

$query=$dbh->prepare($sql);
$query->execute(array($nme,$sname,$mname,$mail));


if($query){
echo'
<script>
alert("Approver Succesfully added");
</script>
';

}else{

echo'
<script>
alert("Something went wrong...");
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

<h3>Approver registration</h3>

<select name="app" required>
<option value="">---Pick Position---</option>
<option value="Approver">Approver</option>
</select>
<br><br>
<label>Surname: </label>
<input type="text" name="sname" required><br><br>

<label>Name: </label>
<input type="text" name="nme" required><br><br>

<label>Middle name: </label>
<input type="text" name="mname"><br><br>

<label>Email: </label>
<input type="email" name="mail" required><br><br>

<input type="submit" value="Submit" name="submit">
<input type="reset">

</form>

</body>
</html>