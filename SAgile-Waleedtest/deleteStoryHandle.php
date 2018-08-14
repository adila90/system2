<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
 
 $id=$_POST['story'];
  $proj=$_POST['project'];
 


$strQuery="delete from stories WHERE PK_ID = '$id'";

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=backlog&proj=".$proj);
 }
  

?>