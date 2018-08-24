<?php
echo'<div id="hh">';
echo'</div>';
require('include/config.php');

$employ=$_SESSION['mail'];
//echo $employ;

//employee details
$sql=" SELECT * FROM `tblemployees` WHERE `email`=?";
$query=$dbh->prepare($sql);
$query->execute(array($employ));
$results=$query->fetchAll(PDO::FETCH_ASSOC);


//manager
$manforu=$results[0]['manager'];
$sqlforman=" SELECT * FROM `tblmanager` WHERE `email`=?";
$queryforman=$dbh->prepare($sqlforman);
$queryforman->execute(array($manforu));
$resultsforman=$queryforman->fetchAll(PDO::FETCH_ASSOC);



//Approver
$appforu=$results[0]['approver'];
$sqlforapp=" SELECT * FROM `tblapprover` WHERE `email`=?";
$queryforapp=$dbh->prepare($sqlforapp);
$queryforapp->execute(array($appforu));
$resultsforapp=$queryforapp->fetchAll(PDO::FETCH_ASSOC);



//work done
$wrkdoneforu=$results[0]['email'];
$sqlwrkdone=" SELECT * FROM `tblworktime` WHERE `employee`=?";
$querywrkdone=$dbh->prepare($sqlwrkdone);
$querywrkdone->execute(array($wrkdoneforu));
$resultsforwrkdone=$querywrkdone->fetchAll(PDO::FETCH_ASSOC);


	if(isset($_POST['submit'])){


		$sdate=strtotime($_POST['frdate']);
		$tdate=strtotime($_POST['todate']);
		$monday = strtotime('last monday', strtotime('tomorrow',$sdate));
		$endmonday = strtotime('last monday', strtotime('tomorrow',$tdate));
		

		
		//hours on work
		$hrsforu=$results[0]['email'];
		$sqlwrkhrs=" SELECT * FROM `tblhours` WHERE employee=? AND dtemon>=? && dtemon<=?  ORDER BY `dte`";
		$querywrkhrs=$dbh->prepare($sqlwrkhrs);
		$querywrkhrs->execute(array($hrsforu,$monday,$endmonday));
		$resultshrsforu=$querywrkhrs->fetchAll(PDO::FETCH_ASSOC);
		

			
			$datesforview=[];
			//store dates in array
			foreach($resultshrsforu as $rest){
				
				$datesforview[]+=$rest['dtemon'];
				
			}
			
			$array_with_no_uplicate=array_unique($datesforview);
			
			
	
	}else{
	
	// no longer in use
		$frd="No Date Selected";
		$td="No Date Selected";
		//here=====
		
		$resultshrsforu	= array(0=>array('accountDescription'=>"Please select the date range",'accountCode'=>"Please select the date range",'hors'=>"Please select the date range"));
	}
 


 
?>

<html>
	<head>
		<title>Time Sheet</title>
		<style>
			@page { size: auto;  margin: 0mm; }
			@media print  
				{
					p{
					page-break-before: always;
					}				
				}
		</style>
	</head>
	<body>

<?php

foreach($array_with_no_uplicate as $displaybyweek){



?>	
				<!--details-->
					<table border="1">
			
						<?php
					
							foreach($results as $re){
								echo'
								Employee
								
								<tr>
								<th>Name</th><th>Salary ref</th><th>Manager</th>
								</tr>
								
								
									<tr>
										<td>'.$re['nme'].' '.$re['surname'].'</td>
									<td>'.$re['empno'].'</td>
									';
								foreach($resultsforman as $reforman){
									//change $reforman[othername] to $reforman[surname]
									echo'
										<td>'.$reforman['nme'].' '.$reforman['othernme'].'</td>
											</tr>
										</table>
									';
								
								}
								
								
								echo '
									<table border="1">
								
								<tr>
								<th>Department</th><th>Unit</th><th>Position</th>
								</tr>
								

										<tr>
											<td>'.$re['departmnt'].'</td>
											<td>'.$re['unit'].'</td>
											<td>'.$re['Position'].'</td>
										</tr>
									</table>
								';
							}
			?>
			
			<!--PAY PERIOD-->
			<?php
			

					echo'
					Pay Period
					<table border=1>
					<tr>
					<td>FROM</td> <td>'.date("Y-M-d",$displaybyweek).'</td><td>TO</td><td> '.date("Y-M-d",strtotime('+4 days',$displaybyweek))
					.'</td></tr>'
					
					;
					

					//table display

						//hours on work
						$hrsforu=$results[0]['email'];
						$sqlwrkhrs=" SELECT * FROM `tblhours` WHERE employee=? AND dtemon=? ORDER BY `dtemon`";
						$querywrkhrs=$dbh->prepare($sqlwrkhrs);
						$querywrkhrs->execute(array($hrsforu,$displaybyweek));
						$resultsfodisplay=$querywrkhrs->fetchAll(PDO::FETCH_ASSOC);



		?>
			
				
			
			
			<!--activity-->
					<table border="1">
						<tr>
							<th>Account Description</th><th>Account Code</th>
							<!--Cycle through the dates-->
							<th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th><th>S</th>
						</tr>
					<?php
					//calculation for whole day
							$tmon=[];
							$ttue=[];
							$twed=[];
							$tthur=[];
							$tfri=[];
							$tsat=[];
							$tsun=[];
							
							$totalforreprt=[];
						echo "<br> Week number ".date("W",$displaybyweek);
			
							foreach($resultsfodisplay as $rehrs){
			
							
								echo'
									<tr>
										<td>'.$rehrs['accountDescription'].'</td><td>'.$rehrs['accountCode'].'</td><td>'.$rehrs['monhrs'].'</td><td>'.$rehrs['tuehrs'].'</td><td>'.$rehrs['wedhrs'].'</td><td>'.$rehrs['thurhrs'].'</td><td>'.$rehrs['frihrs'].'<td>'.$rehrs['sathrs'].'</td><td>'.$rehrs['sunhrs'].'</td>
									</tr>
								';
			
								$tmon[]+=$rehrs['monhrs'];
								$totalforreprt[]+=$rehrs['monhrs'];
								$ttue[]+=$rehrs['tuehrs'];
								$totalforreprt[]+=$rehrs['tuehrs'];
								$twed[]+=$rehrs['wedhrs'];
								$totalforreprt[]+=$rehrs['wedhrs'];
								$tthur[]+=$rehrs['thurhrs'];
								$totalforreprt[]+=$rehrs['thurhrs'];
								$tfri[]+=$rehrs['frihrs'];
								$totalforreprt[]+=$rehrs['frihrs'];
								$tsat[]+=$rehrs['sathrs'];
								$totalforreprt[]+=$rehrs['sathrs'];
								$tsun[]+=$rehrs['sunhrs'];
								$totalforreprt[]+=$rehrs['sunhrs'];
								

								
							}
			?>
					<tr>
						<td></td>	<td>Total </td>	<td><?php $tmondis=array_sum($tmon); echo $tmondis;//monday ?></td>	<td><?php $ttuedis=array_sum($ttue); echo $ttuedis; //tuesday ?></td>	<td><?php $tweddis=array_sum($twed); echo $tweddis; //wednesday ?></td>	<td><?php $tthurdis=array_sum($tthur); echo $tthurdis; //thursday ?></td>	<td><?php $tfridis=array_sum($tfri); echo $tfridis; //friday?></td>	<td><?php $tsatdis=array_sum($tsat); echo $tsatdis; ?></td>	<td><?php $tsundis=array_sum($tsun); echo $tsundis; ?></td>
					<tr>
			
			
					</table>
			
			
						<!--submitter-->
			<?php
					foreach($results as $re){
						foreach($resultsforapp as $reforapp){
							echo'
								<table border=1>
									<tr>
										<th>Submited By</th><th>Approved By</th>
									</tr><tr>
										<td>'.$re['nme'].' '.$re['surname'].'</td><td>'.$reforapp['nme'].' '.$reforapp['surname'].'</td>
									</tr><tr>
										<td>Sign here</td><td>Sign here</td>
									</tr>
								</table>
								Date:
							';
						}
					}

					echo"</p>";
}

echo "Total Hours= ".$totalforreprtAll=array_sum($totalforreprt);
?>

					<div id="hh2">
						<form method="post">
							<label>from date</label>
								<input type="date" name="frdate" required>
							<label>to date</label>
								<input type="date" name="todate" required>
				
								<input type="submit" name="submit"><br><br>
								
								<div id="hh1">
									<input type="button" value="Print report" id="b1">
								</div>
						</form>
					</div>


					
	</body>

	<script type="text/javascript">
		var button = document.getElementById('b1')
		button.addEventListener('click',hideshow,false);

			function hideshow() {
				document.getElementById('hh').style.display='none';
				document.getElementById('hh1').style.display='none';
				document.getElementById('hh2').style.display='none';
				window.print();
			}   
	</script>

</html>