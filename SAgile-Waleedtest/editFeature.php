<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  
 
   
 <br />
  <br />
 <div id="stylized" class="myform" >
  <form id="form" name="form" method="post"  action="editFeatureHandle.php">
  <h1>Edit Feature</h1>
 
 
     <label class="small">Feature Name
  
   </label>
 <input style="margin-left:30px;" type="text" name="name6" id="name6" class="name6" value="<? $DataBase = new Database();
             $strQuery4='select * from security_features where PK_ID='.$featureId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Feature'];
	           
			  echo $name;
              
			   }
			?>"
 
  />
  
   <input style="display:none;" value="<? echo $featureId ?>" type="text" name="hidden9" id="hidden9"  />
 
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



