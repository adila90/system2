<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
   
  <br />
 <div id="stylized" class="myform" >
  <form id="form" name="form" method="post"  action="deleteHandle.php">
  <h1>Delete Project</h1>
 
 
     <label class="small">Project Name
  
   </label>
 <input   style="margin-left:30px;" type="text" name="name3" id="name3" class="name" readonly="readonly" value="<?
  $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
	          $desc= $Row['desc_proj'];
			  echo $name;
              
			   }
			?>"/>
 <input style="display:none;" value="<? echo $projId ?>" type="text" name="hidden2" id="hidden2" class="hidden2" />
 <label class="small">Project Description
  
   </label>
  <textarea   class="Tarea"   type="text" name="desc3" id="desc3" readonly="readonly" ><?  
   $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

           
	          $desc= $Row['desc_proj'];
			  echo $desc;
              
			   }
			?></textarea>
 
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



