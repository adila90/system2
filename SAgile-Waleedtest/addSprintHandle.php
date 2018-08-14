<?php 
session_start();

include "Database.php";
$DataBase = new Database();

$User_Id= $_SESSION['id'];
$name=$_POST['name'];
 
 
$name = stripslashes($name);
 
 
$name = mysql_real_escape_string($name);
 
 $sDate=$_POST['Sdate1'];
$DueDate=$_POST['Sdate2'];

$proj=$_POST['proj'];
$ver=$_POST['ver'];
$strQuery="insert into sprint (FK_User_ID,FK_Proj_ID,FK_Version_ID,sprint_name,Start_Date,due_date,1st_time_date) values ('$User_Id','$proj','$ver','$name','$sDate','$DueDate',Now())";

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php?page=manageSprints&proj=".$proj."&Ver=".$ver);
 }
  

?>