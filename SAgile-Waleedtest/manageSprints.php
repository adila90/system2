
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
<tr>
<td width="13"><img src="images/top_leftround.gif" width="13" height="13" border="0" alt="Rounded corner: top-left" /></td>
<td width="1200" class="top"></td>
<td width="13"><img src="images/top_rightround.gif" width="13" height="13" border="0" alt="Rounded corner: top-right" /></td>
</tr>

<tr>
<td class="left"></td>
<td align="center" width="100%" valign="top">

  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #FFFFFF" valign="top">
     <tr>
       
        <?
	  $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $strQuery5='select * from version where PK_ID='.$versionId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $Pname= $Row['name_Proj'];
			  $finish= $Row['completion_date'];
			      
			   }
			   $DataBase->query($strQuery5);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $Vname= $Row['release_name'];
			      
			   }
			   
			   
			    echo('<p style="float:left;font-size:10px;"> My Iteration >> '.$Pname.' >>'.$Vname.'>> Feature </p>' );
	 ?>
 
<div  <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addSprint&proj=<? echo $projId ?>&Ver=<? echo $versionId ?>'" class='button red'>Add Feature</div>

 <div <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addToTask_T&proj=<? echo $projId ?>&projDate=<? echo $finish ?>'" class='button red small'>Add Non Task </div>
 
 <input style="font-size:12px;" onClick="document.location.reload(true)" type="submit" class="button green small" value="Refresh" />   
 
  <table  class="table" id="table">
   <thead>
    	<tr>
        	<th >Feature ID</th>
            <th  >Feature Name </th>
            <th  >Time Required </th>
           
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
		   $Total=0;
             $strQuery4='select * from sprint where FK_Proj_ID='.$projId.'&& FK_Version_ID = '.$versionId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['sprint_name'];
			  
			   $Sid= $Row['PK_ID'];
           
			   echo('<tr><td>'.$Sid.'</td><td>'.$name.'</td>');
			    $DataBase2 = new Database();
			   $strQuery5="SELECT
stories.remain_Es,
stories.Es_Type,
stories.1st_time_date
FROM
stories ,
sprint_story
WHERE
stories.PK_ID = sprint_story.FK_Story_ID AND
sprint_story.FK_Sprint_ID = '$Sid'";
			  $DataBase2->query($strQuery5);
               $Rows2 = $DataBase2->fetch_all();
			    $count=0;
			   foreach($Rows2 as $Row2){
 
              $remain= $Row2['remain_Es'];
			  
			  $type= $Row2['Es_Type'];
			 
               $date= $Row2['1st_time_date'];	 
				 
   
date_default_timezone_set('Asia/Singapore');
 
 $date1 = new DateTime();
 
$date2 = new DateTime($date);
$diff = $date1->diff($date2);


			   if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		      
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
			 
				$count +=0;
				 
				}
				else if($value > 0)
				{
				 
				 $count +=0;
				}
				else
				{
					$value=abs($value);
					
				   
					 $count +=$value;
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
				 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
			 
				 $count +=0;
				}
			   else if($value > 0)
				{
			 
				 $count +=0;
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
			 
				    $count +=$value;
				}
				 else
				{			
				 
					$value=abs($value);
					 
				  
				   $value=$value*60;
				    $count +=$value;
				}
			}
			if($type == 'days')
			{
	
				$value=$diff->d- $remain;
				 	 
				if($diff->m != 0 || $diff->y != 0 )
				{
			  
				  $count +=0;
				}				
				else if($value > 0)
				{
		 
				  $count +=0;
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
					 
						$count +=$value;
					}
					else
					{
		 
				   $value=$value*60;
				    $count +=$value;
					}
				}
				 else
				{			
				 
					
				    $value=abs($value);
				 
				    $value=$value*24*60;
				   $count +=$value;
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
	       
				   $count +=0;
				}
				 else if($value > 0)
				{
			 
				   $count +=0;
				}
				else if($value==-1)
				{
			        $type="days";
					$value=30-$diff->d;
					if($value==1)
					{		  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
					 
						$count +=$value;
					}
					else
					{
				 
					$value=$value*60;
					$count +=$value;
					}
					}
				else
				{
				 
				$value=$value*60*24;
				$count +=$value;
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				 
				   	$value=$value*60*24*30;
				   $count +=$value;
				}
			}
			   }
			 
			    $Total += $count;
        
  
			   if($count > 43200)
			   { 
 
			    $var = (16/3);
 

                           $months = $count/ 43200;
                         if(is_int($months))
                          {
                          $months=intval($months);
                           }else{
                          $x = $months - floor($months);
                          
                           $months = floor($months);
                           $months=intval($months);
                            $days=(43200 * $x)/1440;
                             $days=floor($days);
                           $days=intval($days);
                             
                           
                          }  
			      if($days==null)
						   {
						    $days="Zero" ;
							
						   }
                
				 
			   echo('<td>'. $months .' Months and '.$days.' Days </td>');
			      $count=0;
			   }
			     else if($count > 1440)
			   { 
                            
 			  $var = (16/3);
                            $days =$count/ 1440;
                          if(is_int($days))
                          {
                          $days=intval($days);
                           }

                          else{
                          $x = $days - floor($days);
                           $hours=(1440 * $x)/60;
                           $hours=round($hours);
                           $hours=intval($hours);
						   
                           $days = floor($days);
                           $days=intval($days);
						   
                           
                          }  
                     
				 if($hours==null)
						   {
						    $hours="Zero" ;
							
						   }
			   echo('<td>'. $days .' Days and '.$hours.' Hours  </td>');
			      $count=0;
			   }
			   else if($count > 60)
			   { 
			 
			  $var = (16/3);
 

                            $hours = $count/60;
			     
                          
                          if(is_int($hours))
                          {
                          
                           }
                          else{
                          $x = $hours - floor($hours);
                           $Mins=(60 * $x);
                           $Mins=round($Mins);
                           $Mins=intval($Mins);
                           $hours = floor($hours);
                           $hours=intval($hours);
                           
                          }  
                
				  if($Mins==null)
						   {
						    $Mins="Zero" ;
							
						   }
			   echo('<td>'. $hours .' Hours And '.$Mins.' Minutes </td>');
			      $count=0;
			   }
			   else
			   {
				    echo('<td>'.$count.'</td>');
			      $count=0;
			   }
			 
			  if ($_SESSION['role'] == 'Project Manager')
			  {
           echo('<td><a class="stylish-button" type="button" href="main.php?page=editSprint&proj='.$projId.'&Ver='.$versionId.'&Spr='.$Sid.'" >Edit</a></td><td><a class="stylish-button" type="button" href="main.php?page=deleteSprint&proj='.$projId.'&Ver='.$versionId.'&Spr='.$Sid.'" >Delete</a></td></tr>');
			  }
		 
            
			   
              
			   }
	 
			  if($Total > 43200)
			   { 
			    $var = (16/3);
 

                          $months = $Total/ 43200;
                         if(is_int($months))
                          {
                          $months=intval($months);
                           }else{
                          $x = $months - floor($months);
                          
                           $months = floor($months);
                           $months=intval($months);
                            $days=(43200 * $x)/1440;
                             $days=floor($days);
                           $days=intval($days);
                             
                           
                          }  
			     
                
				 
			   echo('<tr><td style="color: #039;
	background: #b9c9fe;">Total Time Required</td><td style="color: #039;
	background: #b9c9fe;">'.$months .' Months And '.$days.' Days </td></tr>');
			     
			   }
			     else if($Total > 1440)
			   { 
			  
			    $var = (16/3);
 

               $days = round($Total/ 1440,2);
			     $days=intval($days);
			 
                
			echo('<tr><td style="color: #039;
	background: #b9c9fe;">Total Time Required</td><td style="color: #039;
	background: #b9c9fe;">'.$days .' Days </td></tr>');	 
	 
			       
			   }
			   else if($Total > 60)
			   { 
			 
			  $var = (16/3);
 

               $hours = $Total/60;
			       $hours=intval($hours);
                
				echo('<tr><td style="color: #039;
	background: #b9c9fe;">Total Time Required</td><td style="color: #039;
	background: #b9c9fe;">'.$hours .' Hours </td></tr>');	 
	  
		 
			       
			   }
			   else
			   {
			     $Total =intval($Total);
				   echo('<tr><td style="color: #039;
	background: #b9c9fe;">Total Time Required</td><td style="color: #039;
	background: #b9c9fe;">'.$Total .'  </td></tr>');	 
			       
			   }
			?>
    
    </table>
 
 
 
    