<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  
 
   
 <br />
  <br />
 <div id="stylized" class="myform" >
  <form id="form" name="form" method="post"  action="editVHandle.php">
  <h1>Edit Version</h1>
 
 
     <label class="small">Version Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name4" id="name4" class="name4" value="<?  $DataBase = new Database();
             $strQuery4='select * from version where PK_ID='.$versionId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['release_name'];
	           
			  echo $name;
              
			   }
			?>"
 
  />
 <input style="display:none;" value="<? echo $versionId ?>" type="text" name="hidden3" id="hidden3" class="hidden3" />
 <input style="display:none;" value="<? echo $projId ?>" type="text" name="hidden4" id="hidden4" class="hidden4" />
  
 
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



