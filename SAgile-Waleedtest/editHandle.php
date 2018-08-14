<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 
$name=$_POST['name2'];
$desc=$_POST['desc2'];
 $id=$_POST['hidden'];
 
 $sDate=$_POST['date5'];
 
$FinishDate=$_POST['date7'];


$strQuery="UPDATE project SET name_Proj = '$name',desc_proj='$desc',Start_Date='$sDate',completion_date='$FinishDate' WHERE PK_ID = '$id'";;

//echo "<hr>".$strQuery;

$result=$DataBase->query($strQuery);
 
 

//echo "<hr>".$count;exit;

 if($result == true){
@header("location:main.php");
 }
  

?>