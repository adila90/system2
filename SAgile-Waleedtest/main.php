<? 


session_start();

if (!isset($_SESSION['id'])) {
header('Location: index.html');
}
 include "header.php";
 
   
	 $page=$_REQUEST['page'];
       $projId=$_REQUEST['proj'];
	   $versionId=$_REQUEST['Ver'];
  $sprintId=$_REQUEST['Spr'];
   $subId=$_REQUEST['Sub'];
   $story=$_REQUEST['story'];
   $newProj=$_REQUEST['newProj'];
   $newSub=$_REQUEST['newSub'];
   $teamId=$_REQUEST['Team'];
    $MemId=$_REQUEST['Mem'];
	$Dev=$_REQUEST['Dev'];
	$featureId=$_REQUEST['Feature'];
	$stateId=$_REQUEST['state'];
	$projDate=$_REQUEST['projDate'];
?>

<table width="1024">
       <tr>
           
           <td valign="top">
           <td style="font-size:12px;font-color:brown;padding-left:160px;"><?
		   $id=$_SESSION['id'];
		   $DataBase = new Database();
		   $strQuery="SELECT * FROM users WHERE PK_ID ='$id'";

 

$DataBase->query($strQuery);

$Record = $DataBase->fetch_array();
          echo('Welecome   '.$Record['role']); 
		   
		  
		   ?>
		   </td>
                <?                
                   if($page!="")
                     {
                       $page="$page.php";
                     }else{
                       $page="main_box.php";
                     }
                ?>
                       <table border="0" width="100%">
                       <tr>
                         <td width="18%" align="center" valign="top">
                            <? include "left_menu.php"; ?>
                         </td>
                         <td width="2%" align="center" valign="top">&nbsp;</td>
                         <td width="60%" align="center" valign="top"><?php include($page);?></td>
                         <td width="2%" align="center" valign="top">&nbsp;</td>
                         <td width="18%" align="center" valign="top">
                          <?  include "right_menu.php"; ?>
                         </td>
                      </tr>
                     </table>
           </td>
       </tr>
</table>

<?
   include "footer.php";


?>