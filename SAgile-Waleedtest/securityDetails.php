<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
  <div id="stylized" class="myform2"  >
  <form id="form" name="form" method="post" action="SecurityRemoveHandle.php">
  
  <h1 style="text-align:left" >View: Security Report</h1>
  </br>
  
 
 <input name="story" style="display:none" value="<? echo $story ?> " />
 <input name="project" style="display:none" value="<? echo $projId ?> " />
 <textarea disabled readonly="readonly" style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-top:30px;padding-left:5px;width:100%;font-size:20px;" placeholder="Title" type="text" name="title" id="title" ><?php
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_story'];
			 
              $id= $Row['PK_ID'];
               echo($id.'|'.$name);

			   }
			   ?>
</textarea>
<br />
 <br />
   <h5 style="font_size:12px;float:left;text-align:left" >Security Features </h5>
 
<br />
 <br />
 <br />
  <br />
 <ul style="margin-left:20px;text-align:left;">
 <?php
  $DataBase = new Database();
             $strQuery4='select sf.name_Feature from security_features AS sf INNER JOIN feature_story As fs on sf.PK_ID=fs.FK_Feature_ID  where fs.FK_Story_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Feature'];
			 
            
               echo('<li>'.$name.'</li><br />');

			   }
			   ?>
               <br />
 </ul>

 
 
  
 
 <h5 style="float:left;text-align:left" > Security Comment </h5>
  <br />
   <br />
 <textarea   disabled readonly="readonly" style="font-weight:bold;background-color: #E5E5E5;color:#000;padding-left:5px;width:100%;font-size:14px;" placeholder="No Security Comment" type="text" name="description" id="description" ><?php
  $DataBase = new Database();
             $strQuery4='select * from stories where PK_ID='.$story;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $desc= $Row['SecurityComment'];
			 
  
               echo($desc);

			   }
			   ?>
</textarea>

<button style="float:right;"   type="submit">Remove From Security Backlog </button> 
  
 
   </form>
 </div>
     </tr>
    
  </table>

</td>
 
</tr>

<tr>
 
</tr>
</table>



