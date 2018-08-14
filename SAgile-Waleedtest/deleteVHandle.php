<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name4'];
 
 $id=$_POST['hidden5'];
  $Vid=$_POST['hidden6'];
 


$strQuery="delete from version WHERE PK_ID = '$Vid'";;

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=manageVersions&proj=".$id);
 }
  

?>