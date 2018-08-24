<?php
require('include/config.php');

$employ=$_SESSION['mail'];

$sqlforaccDescription="SELECT * FROM `tblwork` WHERE employee=?";
$queryforaccDescription=$dbh->prepare($sqlforaccDescription);
$queryforaccDescription->execute(array($employ));

$resultsforaccDescription=$queryforaccDescription->fetchAll(PDO::FETCH_ASSOC);
		
		
	if(isset($_POST['submit'])){
	
		$weektest=strtotime($_POST['weekstart']);
		$checkday = date('D',$weektest);
		
		if($checkday == 'Mon'){
	
	
			$wrk=$_POST['wrk'];
			$weekstart=strtotime($_POST['weekstart']);
			//$weekend=strtotime($_POST['weekend']);
			
			
			$wrk_explode = explode('|', $wrk);
			
		
			//dates for workweek
			
			$datetue = strtotime("+1 day", $weekstart);//tuesday
			$datewed = strtotime("+2 day", $weekstart);//wednesday
			$datethur = strtotime("+3 day", $weekstart);//thursday
			$datefri = strtotime("+4 day", $weekstart);//friday
			$datesat = strtotime("+5 day", $weekstart);//friday
			$datesun = strtotime("+6 day", $weekstart);//friday			
			
						
			$sql="INSERT INTO `tblworktime` (`accountDescription`,`accountCode`,`crnum`,`frmdate`,`todate`,`employee`) VALUES(?,?,?,?,?,?)";
			$query=$dbh->prepare($sql);
			$query->execute(array($wrk_explode[0],$wrk_explode[1],$wrk_explode[2],$weekstart,$datesun,$employ));
			
			
				
			//inserting into hours * 5
			//moday
			
			$sqlforhoursmon="INSERT INTO `tblhours`(`accountDescription`,`accountCode`,`dte`,`employee`,`dtemon`,`dtetue`,`dtewed`,`dtethur`,`dtefri`,`dtesat`,`dtesun`) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
			$queryforhoursmon=$dbh->prepare($sqlforhoursmon);
			$queryforhoursmon->execute(array($wrk_explode[0],$wrk_explode[1],$weekstart,$employ,$weekstart,$datetue,$datewed,$datethur,$datefri,$datesat,$datesun));
			
	
	
			if($query && $queryforhoursmon){
	
				echo'
				<script>
				alert("Dates Added");
				</script>
				';
			$_SESSION['mail']=$_POST['mail'];
			
				header('location:hrswrk.php');
	
			}else{
	
				echo'
				<script>
				alert("Dates Not Added");
				</script>
				';
			}
	
		}else{
			echo'
			<script>
			alert("Please a choose a day which is a monday!");
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
		<form method="post">
			<label>Pick work</label>
				<select name="wrk" required>
					<option value="">---CR No. - Account Description - Account Code---</option>
	
					<?php
					foreach($resultsforaccDescription as $re){
						echo'
						<option value="'.$re['crNumber'].'|'.$re['accountDescription'].'|'.$re['accountCode'].'">'.$re['crNumber'].' - '.$re['accountDescription'].''.' - '.$re['accountCode'].' '.'</option>
						';
					}
	
					?>
	
				</select>

			<label>Week-start</label>
				<input type="date" name="weekstart">
					*Please select a monday of the week. 
				<!--
			<label>Week-end</label>
				<input type="date" name="weekend">
				-->
			<input type="submit" value="Submit" name="submit">
			<!--
			<input type="reset">
			-->
		</form>

		<h2>Accounts</h2>
		<?php
							foreach($resultsforaccDescription as $re){
			echo $re['crNumber'].' - '.$re['accountDescription'].' - '.$re['accountCode']."<br>";
							}
		?>
	</body>
</html>