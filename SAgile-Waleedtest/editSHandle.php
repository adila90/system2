<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name6'];
 
 $Vid=$_POST['hidden7'];
  $Pid=$_POST['hidden8'];
  $Sid=$_POST['hidden9'];
 
 


$strQuery="UPDATE sprint SET sprint_name = '$name' WHERE PK_ID = '$Sid'";;

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=manageSprints&proj=".$Pid."&Ver=".$Vid);
 }
  

?>