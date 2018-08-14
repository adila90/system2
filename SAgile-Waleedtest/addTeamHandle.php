<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 $User_Id= $_SESSION['id'];
$name=$_POST['name'];
  
 
$name = stripslashes($name);
 
 
$name = mysql_real_escape_string($name);

 
 
 
 
 
 
$strQuery="insert into teams (FK_User_ID,Team_name,1st_time_date) values ('$User_Id','$name',Now())";

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=Teams");
 }
  

?>