<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  
 
   
 <br />
  <br />
 <div id="stylized" class="myform" >
  <form id="form" name="form" method="post"  action="editTeamHandle.php">
  <h1>Edit Team</h1>
 
 
     <label class="small">Team Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name2" id="name2" class="name" value="<?  
 
  $DataBase = new Database();
             $strQuery4='select * from teams where PK_ID='.$teamId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['Team_name'];
	         
			  echo $name;
              
			   }
			?>"
 
  />
 <input style="display:none;" value="<? echo $teamId ?>" type="text" name="hidden" id="hidden" class="hidden" />
  
 
   <br />
   <br />
   
 
     <button  type="submit">Edit</button>
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



