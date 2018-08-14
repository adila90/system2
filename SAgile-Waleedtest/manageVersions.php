<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
<tr>
<td width="13"><img src="images/top_leftround.gif" width="13" height="13" border="0" alt="Rounded corner: top-left" /></td>
<td width="1200" class="top"></td>
<td width="13"><img src="images/top_rightround.gif" width="13" height="13" border="0" alt="Rounded corner: top-right" /></td>
</tr>

<tr>
<td class="left"></td>
<td align="center" width="100%" valign="top">

  
     <?
	  $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
			   $id= $Row['PK_ID'];
	     echo('<p style="float:left;font-size:10px;"> My Iteration >> '.$name.' >> Iteration </p>' );
			   }
	 ?>
     
     
 
<div  <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addVersion&proj=<? echo $projId ?>';" class='button red'>Add Iteration</div>
<input style="font-size:12px;" onClick="document.location.reload(true)" type="submit" class="button green small" value="Refresh" />   
 
 
 
 
 
    <table  class="table" id="table">
   <thead>
    	<tr>
        	<th >Iteration ID</th>
            <th  >Iteration Name </th>
            <?
			  if ($_SESSION['role'] == 'Project Manager')
			  {
            echo('<th  >Edit</th>
            <th >Delete</th>');
			  }
			  ?>
            
             
        </tr>
    </thead>
    
     
    <?php
	
	 
	 
		 $DataBase = new Database();
             $strQuery4='select * from version where FK_Proj_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['release_name'];
			  
			   $id= $Row['PK_ID'];
			    echo('<tr><td>'.$id.'</td><td>'.$name.'</td>');
              if ($_SESSION['role'] == 'Project Manager')
			  {
			   echo(' <td><a class="stylish-button" type="button" href="main.php?page=editVersion&proj='.$projId.'&Ver='.$id.'" >Edit</a></td><td><a class="stylish-button" type="button" href="main.php?page=deleteVersion&proj='.$projId.'&Ver='.$id.'" >Delete</a></td>');
			  }
			  echo('</tr>');
			   }
			?>
    
    </table>
    


