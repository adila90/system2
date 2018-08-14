<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name3'];

 $id=$_POST['hidden2'];
 
 


$strQuery="delete from teams WHERE PK_ID = '$id'";

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=Teams");
 }
  

?>