<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
<tr>
<td width="13"><img src="images/top_leftround.gif" width="13" height="13" border="0" alt="Rounded corner: top-left" /></td>
<td width="1200" class="top"></td>
<td width="13"><img src="images/top_rightround.gif" width="13" height="13" border="0" alt="Rounded corner: top-right" /></td>
</tr>

<tr>
<td class="left"></td>
<td align="center" width="100%" valign="top">

     
     
 
<div  <? if ($_SESSION['role'] != 'Security Master')
{
echo('style="display:none"');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addFeature';" class='button red'>Add Security Feature </div>

<input style="font-size:12px;" onClick="document.location.reload(true)" type="submit" class="button green small" value="Refresh" />   
 
 
 
 
 
    <table  class="table" id="table">
   <thead>
    	<tr>
        	<th >Feature ID</th>
            <th  >Feature Name </th>
            <?
			  if ($_SESSION['role'] == 'Security Master')
			  {
            echo('<th  >Edit</th>');
			  }
			  ?>
            
             
        </tr>
    </thead>
    
     
    <?php
	
	 
	 
		 $DataBase = new Database();
             $strQuery4='select * from security_features';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Feature'];
			  
			   $id= $Row['PK_ID'];
			    echo('<tr><td>'.$id.'</td><td>'.$name.'</td>');
              if ($_SESSION['role'] == 'Security Master')
			  {
			   echo(' <td><a class="stylish-button" type="button" href="main.php?page=editFeature&Feature='.$id.'" >Edit</a></td>');
			  }
			  echo('</tr>');
			   }
			?>
    
    </table>
    


