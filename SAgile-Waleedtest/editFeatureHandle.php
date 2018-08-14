<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name6'];
 
 
  $Fid=$_POST['hidden9'];
 
 


$strQuery="UPDATE security_features SET name_Feature = '$name' WHERE PK_ID = '$Fid'";;

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=SecFeatures");
 }
  

?>