<?php

require('include/config.php');

$employ=$_SESSION['mail'];
//search for fields with no time
$sqlforaccDescription="SELECT * FROM `tblhours` WHERE employee=? AND hors=?";
$queryforaccDescription=$dbh->prepare($sqlforaccDescription);
$queryforaccDescription->execute(array($employ,'5'));

$resultsforaccDescription=$queryforaccDescription->fetchAll(PDO::FETCH_ASSOC);

//-------------
  
/*$sqlforaccDescription="SELECT * FROM `tblwork` WHERE employee=?";
$queryforaccDescription=$dbh->prepare($sqlforaccDescription);
$queryforaccDescription->execute(array($employ));

$resultsforaccDescription=$queryforaccDescription->fetchAll(PDO::FETCH_ASSOC);*/


	if(isset($_POST['submit'])){

		foreach($resultforsaccDescription as $re){

		//array for each
			
			//monday
			
			//change me
			$goup=[];
			$goup +=[$re['id']];
			$hour=$_POST['hour'.$goup[0]];  
			echo $hour;
			echo print_r($goup);
			$i=$goup[0];
		
			$hour_explode = explode('|', $hour);
			//number of "hour" 4
			$sql="UPDATE `tblhours` SET `id`=?, `dte`=?,`hors`=?, `dtemon`=?, `monhrs`=?, `employee`=? WHERE `id`=$i";
			$query=$dbh->prepare($sql);
			$query->execute(array($re['id'],strtotime(date("y-m-d")),'5',$hour_explode[0],$hour_explode[1],$employ));
			//and me
			$goup=[];
			
			//tuesday
			
			//change me
			$gouptue=[];
			$gouptue +=[$re['id']];
			$hourtue=$_POST['tue'.$gouptue[0]];  

			$itue=$gouptue[0];
		
			$hourtue_explode = explode('|', $hourtue);
			//number of "hour" 4
			$sqltue="UPDATE `tblhours` SET `id`=?, `dtetue`=?, `tuehrs`=?, `employee`=? WHERE `id`=$itue";
			$querytue=$dbh->prepare($sqltue);
			$querytue->execute(array($re['id'],$hourtue_explode[0],$hourtue_explode[1],$employ));
			//and me
			$gouptue=[];			
			
			//wednesday

			$goupwed=[];
			$goupwed +=[$re['id']];
			$hourwed=$_POST['wed'.$goupwed[0]];  

			$iwed=$goupwed[0];
		
			$hourwed_explode = explode('|', $hourwed);
			//number of "hour" 4
			$sqlwed="UPDATE `tblhours` SET `id`=?, `dtewed`=?, `wedhrs`=?, `employee`=? WHERE `id`=$iwed";
			$querywed=$dbh->prepare($sqlwed);
			$querywed->execute(array($re['id'],$hourwed_explode[0],$hourwed_explode[1],$employ));
			//and me
			$goupwed=[];					
			
			
			//thursday
			
			$goupthur=[];
			$goupthur +=[$re['id']];
			$hourthur=$_POST['thur'.$goupthur[0]];  

			$ithur=$goupthur[0];
		
			$hourthur_explode = explode('|', $hourthur);
			//number of "hour" 4
			$sqlthur="UPDATE `tblhours` SET `id`=?, `dtethur`=?, `thurhrs`=?, `employee`=? WHERE `id`=$ithur";
			$querythur=$dbh->prepare($sqlthur);
			$querythur->execute(array($re['id'],$hourthur_explode[0],$hourthur_explode[1],$employ));
			//and me
			$goupthur=[];								
			
			//friday
			
			$goupfri=[];
			$goupfri +=[$re['id']];
			$hourfri=$_POST['fri'.$goupfri[0]];  

			$ifri=$goupfri[0];
		
			$hourfri_explode = explode('|', $hourfri);
			//number of "hour" 4
			$sqlfri="UPDATE `tblhours` SET `id`=?, `dtefri`=?, `frihrs`=?, `employee`=? WHERE `id`=$ifri";
			$queryfri=$dbh->prepare($sqlfri);
			$queryfri->execute(array($re['id'],$hourfri_explode[0],$hourfri_explode[1],$employ));
			//and me
			$goupfri=[];			
			
			//saturday
			
			$goupsat=[];
			$goupsat +=[$re['id']];
			$hoursat=$_POST['sat'.$goupsat[0]];  

			$isat=$goupsat[0];
		
			$hoursat_explode = explode('|', $hoursat);
			//number of "hour" 4
			$sqlsat="UPDATE `tblhours` SET `id`=?, `dtesat`=?, `sathrs`=?, `employee`=? WHERE `id`=$isat";
			$querysat=$dbh->prepare($sqlsat);
			$querysat->execute(array($re['id'],$hoursat_explode[0],$hoursat_explode[1],$employ));
			//and me
			$goupsat=[];			
			
			//sunday
			
			$goupsun=[];
			$goupsun +=[$re['id']];
			$hoursun=$_POST['sun'.$goupsun[0]];  

			$isun=$goupsun[0];
		
			$hoursun_explode = explode('|', $hoursun);
			//number of "hour" 4
			$sqlsun="UPDATE `tblhours` SET `id`=?, `dtesun`=?, `sunhrs`=?, `employee`=? WHERE `id`=$ifri";
			$querysun=$dbh->prepare($sqlsun);
			$querysun->execute(array($re['id'],$hoursun_explode[0],$hoursun_explode[1],$employ));
			//and me
			$goupsun=[];
			
		}

		if($query){

		echo'
			<script>
			alert("success");
			window.location="addTimeToWork.php";
			</script>

			';
		}else{
			echo '
			<script>
			alert("unsuccessful");
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
		<div id="hh">
		<h3>BOOK TIME FOR 
		    <div style="underline">		<?php
							foreach($resultsforaccDescription as $re){
			echo $re['crNumber'].' - '.$re['accountDescription'].' - '.$re['accountCode']."<br>";
							}           ?>
		    </div>
		</h3>
		
		<form method="post" >
		<?php

			foreach($resultsforaccDescription as $re){
				//take me
				$dte = date('Y-M-d D', $re['dtemon']);	
				echo $re['crNumber'].' - '.$re['accountDescription'].' - '.$re['accountCode'].'<br>';				
				//monday
				echo'
				<select name="hour'.$re['id'].'"  required>
				<option value="">----Pick Hours----</option>
				<option value="'.$re['dtemon'].'|0.0">0</option>
				<option value="'.$re['dtemon'].'|1">1</option>
				<option value="'.$re['dtemon'].'|1.5">1.5</option>
				<option value="'.$re['dtemon'].'|2">2</option>
				<option value="'.$re['dtemon'].'|2.5">2.5</option>
				<option value="'.$re['dtemon'].'|3">3</option>
				<option value="'.$re['dtemon'].'|3.5">3.5</option>
				<option value="'.$re['dtemon'].'|4">4</option>
				<option value="'.$re['dtemon'].'|4.5">4.5</option>
				<option value="'.$re['dtemon'].'|5">5</option>
				<option value="'.$re['dtemon'].'|5.5">5.5</option>
				<option value="'.$re['dtemon'].'|6">6</option>
				<option value="'.$re['dtemon'].'|6.5">6.5</option>
				<option value="'.$re['dtemon'].'|7">7</option>
				<option value="'.$re['dtemon'].'|7.5">7.5</option>
				<option value="'.$re['dtemon'].'|8">8</option>
				<option value="'.$re['dtemon'].'|8.5">8.5</option>
				</select>
				'.'<br>';
				
				//tuesday
				echo "<br>";				

				//info
				$dte = date('Y-M-d D', $re['dtetue']);	
				echo'Acc: '.$re['accountDescription'].'<br>Acc-Code: '.$re['accountCode'].'<br>Date: '.$dte.'<br>';				
				//dropdown
				echo'
				<select name="tue'.$re['id'].'"  required>
				<option value="">----Pick Hours----</option>
				<option value="'.$re['dtetue'].'|0.0">0</option>
				<option value="'.$re['dtetue'].'|1">1</option>
				<option value="'.$re['dtetue'].'|1.5">1.5</option>
				<option value="'.$re['dtetue'].'|2">2</option>
				<option value="'.$re['dtetue'].'|2.5">2.5</option>
				<option value="'.$re['dtetue'].'|3">3</option>
				<option value="'.$re['dtetue'].'|3.5">3.5</option>
				<option value="'.$re['dtetue'].'|4">4</option>
				<option value="'.$re['dtetue'].'|4.5">4.5</option>
				<option value="'.$re['dtetue'].'|5">5</option>
				<option value="'.$re['dtetue'].'|5.5">5.5</option>
				<option value="'.$re['dtetue'].'|6">6</option>
				<option value="'.$re['dtetue'].'|6.5">6.5</option>
				<option value="'.$re['dtetue'].'|7">7</option>
				<option value="'.$re['dtetue'].'|7.5">7.5</option>
				<option value="'.$re['dtetue'].'|8">8</option>
				<option value="'.$re['dtetue'].'|8.5">8.5</option>
				</select>
				'.'<br>';
				
				//wed

				echo "<br>";				
				
				//info
				$dte = date('Y-M-d D', $re['dtewed']);	
				echo'Acc: '.$re['accountDescription'].'<br>Acc-Code: '.$re['accountCode'].'<br>Date: '.$dte.'<br>';				
				//dropdown
				echo'
				<select name="wed'.$re['id'].'"  required>
				<option value="">----Pick Hours----</option>
				<option value="'.$re['dtewed'].'|0.0">0</option>
				<option value="'.$re['dtewed'].'|1">1</option>
				<option value="'.$re['dtewed'].'|1.5">1.5</option>
				<option value="'.$re['dtewed'].'|2">2</option>
				<option value="'.$re['dtewed'].'|2.5">2.5</option>
				<option value="'.$re['dtewed'].'|3">3</option>
				<option value="'.$re['dtewed'].'|3.5">3.5</option>
				<option value="'.$re['dtewed'].'|4">4</option>
				<option value="'.$re['dtewed'].'|4.5">4.5</option>
				<option value="'.$re['dtewed'].'|5">5</option>
				<option value="'.$re['dtewed'].'|5.5">5.5</option>
				<option value="'.$re['dtewed'].'|6">6</option>
				<option value="'.$re['dtewed'].'|6.5">6.5</option>
				<option value="'.$re['dtewed'].'|7">7</option>
				<option value="'.$re['dtewed'].'|7.5">7.5</option>
				<option value="'.$re['dtewed'].'|8">8</option>
				<option value="'.$re['dtewed'].'|8.5">8.5</option>
				</select>
				'.'<br>';
				
				
				//thur
				
				echo "<br>";				
				
				//info
				$dte = date('Y-M-d D', $re['dtethur']);	
				echo'Acc: '.$re['accountDescription'].'<br>Acc-Code: '.$re['accountCode'].'<br>Date: '.$dte.'<br>';				
				//dropdown
				echo'
				<select name="thur'.$re['id'].'"  required>
				<option value="">----Pick Hours----</option>
				<option value="'.$re['dtethur'].'|0.0">0</option>
				<option value="'.$re['dtethur'].'|1">1</option>
				<option value="'.$re['dtethur'].'|1.5">1.5</option>
				<option value="'.$re['dtethur'].'|2">2</option>
				<option value="'.$re['dtethur'].'|2.5">2.5</option>
				<option value="'.$re['dtethur'].'|3">3</option>
				<option value="'.$re['dtethur'].'|3.5">3.5</option>
				<option value="'.$re['dtethur'].'|4">4</option>
				<option value="'.$re['dtethur'].'|4.5">4.5</option>
				<option value="'.$re['dtethur'].'|5">5</option>
				<option value="'.$re['dtethur'].'|5.5">5.5</option>
				<option value="'.$re['dtethur'].'|6">6</option>
				<option value="'.$re['dtethur'].'|6.5">6.5</option>
				<option value="'.$re['dtethur'].'|7">7</option>
				<option value="'.$re['dtethur'].'|7.5">7.5</option>
				<option value="'.$re['dtethur'].'|8">8</option>
				<option value="'.$re['dtethur'].'|8.5">8.5</option>
				</select>
				'.'<br>';				
				
				//fri
				
				echo "<br>";				
				
				//info
				$dte = date('Y-M-d D', $re['dtefri']);	
				echo'Acc: '.$re['accountDescription'].'<br>Acc-Code: '.$re['accountCode'].'<br>Date: '.$dte.'<br>';				
				//dropdown
				echo'
				<select name="fri'.$re['id'].'"  required>
				<option value="">----Pick Hours----</option>
				<option value="'.$re['dtefri'].'|0.0">0</option>
				<option value="'.$re['dtefri'].'|1">1</option>
				<option value="'.$re['dtefri'].'|1.5">1.5</option>
				<option value="'.$re['dtefri'].'|2">2</option>
				<option value="'.$re['dtefri'].'|2.5">2.5</option>
				<option value="'.$re['dtefri'].'|3">3</option>
				<option value="'.$re['dtefri'].'|3.5">3.5</option>
				<option value="'.$re['dtefri'].'|4">4</option>
				<option value="'.$re['dtefri'].'|4.5">4.5</option>
				<option value="'.$re['dtefri'].'|5">5</option>
				<option value="'.$re['dtefri'].'|5.5">5.5</option>
				<option value="'.$re['dtefri'].'|6">6</option>
				<option value="'.$re['dtefri'].'|6.5">6.5</option>
				<option value="'.$re['dtefri'].'|7">7</option>
				<option value="'.$re['dtefri'].'|7.5">7.5</option>
				<option value="'.$re['dtefri'].'|8">8</option>
				<option value="'.$re['dtefri'].'|8.5">8.5</option>
				</select>
				'.'<br>';								
				
				//sat
				
				echo "<br>";				
				
				//info
				$dte = date('Y-M-d D', $re['dtesat']);	
				echo'Acc: '.$re['accountDescription'].'<br>Acc-Code: '.$re['accountCode'].'<br>Date: '.$dte.'<br>';				
				//dropdown
				echo'
				<select name="sat'.$re['id'].'"  required>
				<option value="">----Pick Hours----</option>
				<option value="'.$re['dtesat'].'|0.0">0</option>
				<option value="'.$re['dtesat'].'|1">1</option>
				<option value="'.$re['dtesat'].'|1.5">1.5</option>
				<option value="'.$re['dtesat'].'|2">2</option>
				<option value="'.$re['dtesat'].'|2.5">2.5</option>
				<option value="'.$re['dtesat'].'|3">3</option>
				<option value="'.$re['dtesat'].'|3.5">3.5</option>
				<option value="'.$re['dtesat'].'|4">4</option>
				<option value="'.$re['dtesat'].'|4.5">4.5</option>
				<option value="'.$re['dtesat'].'|5">5</option>
				<option value="'.$re['dtesat'].'|5.5">5.5</option>
				<option value="'.$re['dtesat'].'|6">6</option>
				<option value="'.$re['dtesat'].'|6.5">6.5</option>
				<option value="'.$re['dtesat'].'|7">7</option>
				<option value="'.$re['dtesat'].'|7.5">7.5</option>
				<option value="'.$re['dtesat'].'|8">8</option>
				<option value="'.$re['dtesat'].'|8.5">8.5</option>
				</select>
				'.'<br>';				
				
				//sun
				
				echo "<br>";				
				
				//info
				$dte = date('Y-M-d D', $re['dtesun']);	
				echo'Acc: '.$re['accountDescription'].'<br>Acc-Code: '.$re['accountCode'].'<br>Date: '.$dte.'<br>';				
				//dropdown
				echo'
				<select name="sun'.$re['id'].'"  required>
				<option value="">----Pick Hours----</option>
				<option value="'.$re['dtesun'].'|0.0">0</option>
				<option value="'.$re['dtesun'].'|1">1</option>
				<option value="'.$re['dtesun'].'|1.5">1.5</option>
				<option value="'.$re['dtesun'].'|2">2</option>
				<option value="'.$re['dtesun'].'|2.5">2.5</option>
				<option value="'.$re['dtesun'].'|3">3</option>
				<option value="'.$re['dtesun'].'|3.5">3.5</option>
				<option value="'.$re['dtesun'].'|4">4</option>
				<option value="'.$re['dtesun'].'|4.5">4.5</option>
				<option value="'.$re['dtesun'].'|5">5</option>
				<option value="'.$re['dtesun'].'|5.5">5.5</option>
				<option value="'.$re['dtesun'].'|6">6</option>
				<option value="'.$re['dtesun'].'|6.5">6.5</option>
				<option value="'.$re['dtesun'].'|7">7</option>
				<option value="'.$re['dtesun'].'|7.5">7.5</option>
				<option value="'.$re['dtesun'].'|8">8</option>
				<option value="'.$re['dtesun'].'|8.5">8.5</option>
				</select>
				'.'<br>';				
				
			}
		?>
<br>

		<input type="submit" value="Submit" name="submit">

		</form>
		</div>
	</body>

	<?php

	//hide form for no work
	//if(count($results)<1){
		//echo"
			//<script>
				//document.getElementById('hh').style.display='none';
				//var y;
				//y=confirm('Would you like to pick an activy to book time against?');
				//if(y==true){
					//window.location = 'addTimeToWork.php';
				//}else{
					//window.location = 'welcome.php';
				//}
			//</script>
		//";
	
	//}

	?>
	
</html>