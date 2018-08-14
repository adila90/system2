<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  
 
   
 <br />
  <br />
 <div id="stylized" class="myform" >
  <form id="form" name="form" method="post"  action="editSHandle.php">
  <h1>Edit Sprint</h1>
 
 
     <label class="small">Sprint Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name6" id="name6" class="name6" value="<? $DataBase = new Database();
             $strQuery4='select * from sprint where PK_ID='.$sprintId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['sprint_name'];
	           
			  echo $name;
              
			   }
			?>"
 
  />
 <input style="display:none;" value="<? echo $versionId ?>" type="text" name="hidden7" id="hidden7"   />
 <input style="display:none;" value="<? echo $projId ?>" type="text" name="hidden8" id="hidden8"  />
   <input style="display:none;" value="<? echo $sprintId ?>" type="text" name="hidden9" id="hidden9"  />
 
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



