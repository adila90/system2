<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  
  
  <br />
 <div id="stylized" class="myform" >
  <form id="form" name="form" method="post"  action="deleteSHandle.php">
  <h1>Delete Sprint</h1>
 
 
     <label class="small">Sprint Name
  
   </label>
 <input   style="margin-left:30px;" type="text" name="name5" id="name5" class="name" readonly="readonly" value="
 <?  
 
  $DataBase = new Database();
             $strQuery4='select * from sprint where PK_ID='.$sprintId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['sprint_name'];
	   
			  echo $name;
              
			   }
			?>"
 />
  
   <input style="display:none;" value="<? echo $projId ?>" type="text" name="hidden5" id="hidden5" class="hidden5" />
   <input style="display:none;" value="<? echo $versionId ?>" type="text" name="hidden6" id="hidden6" class="hidden6" />
      <input style="display:none;" value="<? echo $sprintId ?>" type="text" name="hidden7" id="hidden7" class="hidden6" />
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



