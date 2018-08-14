<?php 
session_start();

include "Database.php";
$DataBase2= new Database();

$User_Id= $_SESSION['id'];
$proj=$_POST['select4'];
$status=$_POST['select5'];
 
$proi=$_POST['select7'];
$assigned=$_POST['select8'];
 $Team=$_POST['select07'];
$assigned_Tester=$_POST['select08'];
$requested=$_POST['select9'];
$EsType=$_POST['select10'];
 
$orgEs=$_POST['original'];
 
$sDate=$_POST['date5'];
 
$FinishDate=$_POST['date7'];
 $name=$_POST['title'];
  $story=$_POST['story'];
  $proj=$_POST['project'];
$desc=$_POST['description'];
 
 
 
  
$strQuery2="Update stories set FK_Team_ID='$Team',assigned_to_tester='$assigned_Tester',FK_User_ID='$User_Id',FK_Proj_ID='$proj',name_story='$name',desc_story='$desc',prio_story='$proi',Workflow='$status',Start_Date='$sDate',completion_date='$FinishDate',assigned_to='$assigned',Requested_by='$requested',original_Es='$orgEs',remain_Es='$orgEs',Es_Type='$EsType' Where PK_ID=".$story;

 
 
$result=$DataBase2->query($strQuery2);
 $strQuery2="insert into  story_history(FK_Dev_ID,FK_Tester_ID,FK_Story_ID,Status,1st_time_date) values ('$assigned','$assigned_Tester','$story','$status',Now())";
 $result=$DataBase2->query($strQuery2);
 

 

 if($result == true){
	 
@header("location:main.php?page=backlog&proj=".$proj);
 }
  

?>