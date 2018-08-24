<?php

require('include/config.php');


$sample=$_SESSION['mail'];
$sql = "SELECT * FROM `tblemployees` WHERE email=?";

$query = $dbh -> prepare($sql);
$query->execute(array($sample));

$results=$query->fetchAll(PDO::FETCH_ASSOC);

// looping on all results
// foreach($results as $view){
//	 echo $view['nme']."<br>";
// }

 
?>

<!doctype html>
<html>
	<head>
		<title></title>
		
		
	</head>
	<body>
		<h1>WELCOME</h1> 
		<?php

		echo $results[0]['nme'];
		?>
	</body>
</html>