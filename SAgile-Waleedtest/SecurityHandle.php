<?php 
session_start();

include "Database.php";
$DataBase = new Database();

 $User_Id= $_SESSION['id'];
$story=$_POST['story'];
$comment=$_POST['Scomment'];
 $Dev=$_POST['Dev'];
$Tester=$_POST['Tester'];
$state=$_POST['flow'];
$Dcomment=$_POST['Dcomment'];
$Tcomment=$_POST['Tcomment'];
$project=$_POST['project'];
$status=$_POST['DState'];
 $status2=$_POST['TState'];

if ($_SESSION['role'] == 'Security Master')
{
$strQuery="update stories set AddedToSecurity=1 where PK_ID=".$story;

 

$result=$DataBase->query($strQuery);
 
 
 
 

 $strQuery="Delete From  feature_story where FK_Story_ID='$story'"; 
			  $result=$DataBase->query($strQuery);
 
 
 foreach ($_POST['Field2'] as $value) {
			 
			 $strQuery="insert into  feature_story(FK_User_ID,FK_Story_ID,FK_Feature_ID,1st_time_date) values('$User_Id','$story','$value',Now())"; 
			 $result=$DataBase->query($strQuery);
			
			  
            
          }
          
         $strQuery2="update stories set SecurityComment='$comment' where PK_ID='$story'";
			  $result=$DataBase->query($strQuery2);

 

 if($result == true){
@header("location:main.php?page=backlog&proj=".$project);


 }
 }
 else if ($_SESSION['role'] == 'Developer')
 {
 $strQuery="update stories set Developer_Comment='$Dcomment',Workflow='$status' where PK_ID=".$story;

 $result=$DataBase->query($strQuery);
 
 $strQuery2="insert into  story_history(FK_Dev_ID,FK_Tester_ID,FK_Story_ID,Status,1st_time_date) values ('$User_Id','$Tester','$story','$status',Now())";
$result=$DataBase->query($strQuery2);

if($result == true){
@header("location:main.php?page=backlog&proj=".$project);


 }
 }
  else if ($_SESSION['role'] == 'Tester')
 {
 $strQuery="update stories set Tester_Comment='$Tcomment',assigned_to_tester='$User_Id',Workflow='$status2'  where PK_ID=".$story;

 

$result=$DataBase->query($strQuery);
$strQuery2="insert into  story_history(FK_Dev_ID,FK_Tester_ID,FK_Story_ID,Status,1st_time_date) values ('$Dev','$User_Id','$story','$status2',Now())";
$result=$DataBase->query($strQuery2);
if(isset($_POST['bug_found']))
{
$strQuery="update stories set Bug_Found=1 where PK_ID=".$story;

 

$result=$DataBase->query($strQuery);
}


if($result == true){
@header("location:main.php?page=backlog&proj=".$project);


 }
 } 

?>