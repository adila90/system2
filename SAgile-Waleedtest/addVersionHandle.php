<?php 
session_start();

include "Database.php";
$DataBase = new Database();

$User_Id= $_SESSION['id'];
$name=$_POST['name'];
 
 
$name = stripslashes($name);
 
 
$name = mysql_real_escape_string($name);
 
 $sDate=$_POST['Vdate1'];
$DueDate=$_POST['Vdate2'];

$proj=$_POST['proj'];
$strQuery="insert into version (FK_User_ID,FK_Proj_ID,release_name,Start_Date,due_date,1st_time_date) values ('$User_Id','$proj','$name','$sDate','$DueDate',Now())";



$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=manageVersions&proj=".$proj);
 }
  

?>