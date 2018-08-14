<?php 
session_start();

include "Database.php";
$DataBase2= new Database();

$User_Id= $_SESSION['id'];
$proj=$_POST['select4'];
$status=$_POST['select5'];
$release=$_POST['select6'];
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
$desc=$_POST['description'];
$name = stripslashes($name);
$desc = stripslashes($desc);

$name = mysql_real_escape_string($name);
$desc = mysql_real_escape_string($desc);
 
 


  
$strQuery2="insert into stories(FK_User_ID,FK_Proj_ID, name_story,desc_story,prio_story,Workflow,1st_time_date,Start_Date, completion_date,assigned_to,Requested_by,original_Es,remain_Es,Es_Type,FK_Team_ID,assigned_to_tester) values ('$User_Id','$proj','$name','$desc','$proi','$status',Now(),'$sDate','$FinishDate','$assigned','$requested','$orgEs','$orgEs','$EsType', '$Team','$assigned_Tester')";
 
 
$result=$DataBase2->query($strQuery2);

 $strQuery4='select * from stories Order by PK_ID DESC Limit 1';
			  $DataBase2->query($strQuery4);
               $Rows = $DataBase2->fetch_all();
			   
			   foreach($Rows as $Row){
 
			  $id=$Row['PK_ID'];
	 
			  }
 
 
$strQuery2="insert into  story_history(FK_Dev_ID,FK_Tester_ID,FK_Story_ID,Status,1st_time_date) values ('$assigned','$assigned_Tester','$id','$status',Now())";
 $result=$DataBase2->query($strQuery2);

 if($result == true){
	 
@header("location:main.php?page=backlog&proj=".$proj);
 }
  

?>