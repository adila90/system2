<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
 <tr>
       
 
 <div id="stylized" class="myform2" >
  <form id="form" name="form" method="post"  action="addToSubHandle.php">
  <h1>Add Stories to Sub Project</h1>
  <br />
 <?
 $DataBase = new Database();
             $strQuery4='select * from sub_story where FK_Sub_ID='.$subId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			 
			   foreach($Rows as $Row){
 
                    $FID[]= $Row['FK_Story_ID'];
                    
 
			   }	  
	
 
  
 $strQuery4='select * from stories where FK_Proj_ID='.$projId ;
	
$DataBase->query($strQuery4);
 $Rows = $DataBase->fetch_all();
 
   foreach($Rows as $Row){
$name= $Row['name_story'];
$id= $Row['PK_ID'];
 if($FID != null)
 {
 
 if (in_array($id, $FID)) {
 
echo('<input checked type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
 
}
else 
{
 
echo('<input type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');
}
}
else
{
echo('<input type="checkbox" value="'.$id.'" name="Field2[]" />');
echo('<label style="text-align:left;" for="'.$name.'">'.$name.'</label>');

}

 
 }
 

		echo('<br />');
		echo('<br />');
 ?>
 
 <input  style="display:none" name="sub" id="sub" value="<? echo $subId ?>" /> 
 <input  style="display:none" name="projId" id="proj" value="<? echo $projId ?>" /> 
  <br />
  <br />
      <button  style="float:right;" type="submit">Add</button>
      
     <br />
  <br />
    <br />    
       
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



