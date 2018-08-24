<?php

require('../include/config.php');

//employees
$sql=" SELECT * FROM `tblemployees`";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_ASSOC);

echo "<br>EMPLOYEES<br>";
print_r($results);

//Approver

$sqlforapp=" SELECT * FROM `tblapprover`";
$queryforapp=$dbh->prepare($sqlforapp);
$queryforapp->execute();
$resultsforapp=$queryforapp->fetchAll(PDO::FETCH_ASSOC);

echo "<br>APPROVERS<br>";
print_r($resultsforapp);

//manager

$sqlforman=" SELECT * FROM `tblmanager`";
$queryforman=$dbh->prepare($sqlforman);
$queryforman->execute();
$resultsforman=$queryforman->fetchAll(PDO::FETCH_ASSOC);

echo "<br>MANAGERS<br>";
print_r($resultsforman);

//Work

$sqlwrkdone=" SELECT * FROM `tblwork`";
$querywrkdone=$dbh->prepare($sqlwrkdone);
$querywrkdone->execute();
$resultsforwrkdone=$querywrkdone->fetchAll(PDO::FETCH_ASSOC);

echo "<br>WORK<br>";
print_r($resultsforwrkdone);

//work date

$sqlwrkdate=" SELECT * FROM `tblworktime`";
$querywrkdate=$dbh->prepare($sqlwrkdate);
$querywrkdate->execute();
$resultsforwrkdate=$querywrkdate->fetchAll(PDO::FETCH_ASSOC);

echo "<br>WORK DATE<br>";
print_r($resultsforwrkdate);

//work hours

$sqlwrkhour=" SELECT * FROM `tblhours`";
$querywrkhour=$dbh->prepare($sqlwrkhour);
$querywrkhour->execute();
$resultsforwrkhour=$querywrkhour->fetchAll(PDO::FETCH_ASSOC);

echo "<br>WORK HOURS<br>";
print_r($resultsforwrkhour);


?>