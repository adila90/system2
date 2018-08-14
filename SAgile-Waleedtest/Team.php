<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
<tr>
<td width="13"><img src="images/top_leftround.gif" width="13" height="13" border="0" alt="Rounded corner: top-left" /></td>
<td width="1200" class="top"></td>
<td width="13"><img src="images/top_rightround.gif" width="13" height="13" border="0" alt="Rounded corner: top-right" /></td>
</tr>

<tr>
<td class="left"></td>
<td align="center" width="100%" valign="top">

  
     <?
	 
	     echo('<p style="float:left;font-size:10px;">Team Members</p>' );
			    ?>
     
     
 
<div  <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addMember&Team=<? echo $teamId; ?>'" class='button red'>Add Team Member</div>

 
<input style="font-size:12px;" onClick="document.location.reload(true)" type="submit" class="button green small" value="Refresh" />   
 
 
 
 
 
    <table  class="table" id="table">
   <thead>
    	<tr>
        	<th >Member ID</th>
            <th  >Member Name </th>
            <th >Member Role</th>
         
             <th >Member Email</th>
            <?
			  if ($_SESSION['role'] == 'Project Manager')
			  {
            echo('<th  >Edit</th>
            <th >Delete</th>');
			  }
			  ?>
             
        </tr>
    </thead>
    
     
    <?php
	
	 
	 
		 $DataBase = new Database();
             $strQuery4='select * from users where FK_Team_Id='.$teamId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['username'];
			   $email= $Row['email'];
			    $role= $Row['role'];
			   $id= $Row['PK_ID'];
			   echo('<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$role.'</td><td>'.$email.'</td>');
                if ($_SESSION['role'] == 'Project Manager')
				{
			   echo('<td><a class="stylish-button" type="button" href="main.php?page=editMember&Mem='.$id.'&Team='.$teamId.'" >Edit</a></td><td><a class="stylish-button" type="button" href="main.php?page=deleteMember&Mem='.$id.'&Team='.$teamId.'" >Delete</a></td>');
				}
				echo('</tr>');
			   }
			?>
    
    </table>
    


