<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
   
  <br />
 <div id="stylized" class="myform" >
  <form id="form" name="form" method="post"  action="deleteTeamHandle.php">
  <h1>Delete Team</h1>
 
 
     <label class="small">Team Name
  
   </label>
 <input   style="margin-left:30px;" type="text" name="name3" id="name3" class="name" readonly="readonly" value="<?
  $DataBase = new Database();
             $strQuery4='select * from teams where PK_ID='.$teamId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['Team_name'];
	     
			  echo $name;
              
			   }
			?>"/>
 <input style="display:none;" value="<? echo $teamId ?>" type="text" name="hidden2" id="hidden2" class="hidden2" />
 
   
 
   <br />
   <br />
   
 
     <button  type="submit">delete</button>
 <div class="spacer"></div>
 
   </form>
 </div>

  </br>
 
     </tr>
    
  </table>

</td>
 
</tr>

<tr>
 
</tr>
</table>



