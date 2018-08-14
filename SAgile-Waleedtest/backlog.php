 <?
 	if(isset($projId))
	{
	  $DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
			   $id= $Row['PK_ID'];
			      $finish= $Row['completion_date'];
	     echo('<p style="float:left;font-size:10px;"> My Projects >> '.$name.' >> Story </p>' );
			   }
			   }
			   
			   
if(isset($newProj))
{
 
	$DataBase2 = new Database();
	
             $strQuery5="CREATE TEMPORARY TABLE tmptable SELECT * FROM stories WHERE PK_ID = '$story'";
			 $DataBase2->query($strQuery5);
			 $strQuery5="UPDATE tmptable SET PK_ID = NULL";
			 $DataBase2->query($strQuery5);
			 $strQuery5="INSERT INTO stories SELECT * FROM tmptable";
			 $DataBase2->query($strQuery5);
			  $strQuery5="DROP TEMPORARY TABLE IF EXISTS tmptable";
			 $DataBase2->query($strQuery5);


 
			 
		 
			 
			   $strQuery6='SELECT * FROM stories ORDER BY PK_ID DESC LIMIT 1';
			      $DataBase2->query($strQuery6);
				  $Rows2 = $DataBase2->fetch_all();
			   
			   foreach($Rows2 as $Row2){

                $User_Id= $_SESSION['id'];
			   $id2= $Row2['PK_ID'];
			  
			   $strQuery7='update stories  set FK_User_ID="'.$User_Id.'", FK_Proj_ID="'.$newProj.'",1st_time_date=Now() where PK_ID="'.$id2.'"';
			   $DataBase2->query($strQuery7);
			   
			 
			  
			   
}
}
	 ?>
      


 <div <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addStory&proj=<? echo $projId ?>&projDate=<? echo $finish ?>'" class='button red small'>Add Task </div>
  <div  <div <? if ($_SESSION['role'] != 'Project Manager')
{
echo('style="display:none;font-size:12px');
} ?> style="font-size:12px;" onclick="top.location.href='main.php?page=addSub&proj=<? echo $projId ?>';" class='button red small'>Add Sub Project </div>

<input style="font-size:12px;" onClick="document.location.reload(true)" type="submit" class="button green small" value="Refresh" />   
 
  
  
  <select id="select3" onchange="javascript:valueselect3(this)">
 <option selected="selected">Choose Project</option>
  <?php
			$DataBase = new Database();
             $strQuery4='select * from project where PK_ID='.$projId;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

               $Pname= $Row['name_Proj'];
			   }
            
			
             $strQuery4='select * from project';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
			  $desc= $Row['desc_proj'];
              $id= $Row['PK_ID'];
			  if($name==$Pname)
			  {
               echo('<option selected="selected" id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			  }
		       else
			   {
				    echo('<option  id="'.$id.'" value="'.$id.'">'.$name.'</option>');
			   }

			   }
			   
			    
			
			    
			?>
 </select>
 

    
 
    <table class="table" id="table">
   <thead>
    	<tr>
        	<th >ID</th>
            <th  >Title</th>
            <th  >Workflow step</th>
            <th >priority</th>
            <th  >Developer</th>            
            <th  >Remaining</th>
             
              <?
			  if ($_SESSION['role'] == 'Project Manager')
			  {
            echo('<th  >Copy</th><th  >Edit</th>
            <th >Delete</th>');
			  }
			  ?>
        </tr>
    </thead>
    
  
    <?php
	
	if(isset($projId))
	{
		 $DataBase = new Database();
             $strQuery4="select st.name_state,s.assigned_to,s.assigned_to_tester,s.FK_Team_ID,s.AddedToSecurity,s.1st_time_date,s.FK_Proj_ID,s.PK_ID,s.name_story,s.desc_story,s.prio_story,s.remain_Es,s.Es_Type,s.PK_ID,u.username from stories AS s INNER JOIN users AS u  ON s.assigned_to = u.PK_ID INNER JOIN states AS st  ON s.Workflow = st.PK_ID   WHERE s.FK_Proj_ID ='$projId' ORDER BY s.PK_ID DESC";
	
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
		  
	foreach($Rows as $Row){
            
			 
          $StoryId= $Row['PK_ID'];
			 $Team= $Row['FK_Team_ID'];
		  $name= $Row['name_story'];
		   $secured= $Row['AddedToSecurity'];
                   $id= $Row['PK_ID'];
 			  $desc= $Row['desc_story'];
			  $status=$Row['name_state'];
			  $proio=$Row['prio_story'];
              $id= $Row['PK_ID'];
			    $remain= $Row['remain_Es'];
				$type= $Row['Es_Type'];
			    $user= $Row['username'];	 
              $proj= $Row['FK_Proj_ID'];	
			    $date= $Row['1st_time_date'];	 
				$assignedTo= $Row['assigned_to'];	
				$assignedToTester= $Row['assigned_to_tester'];	
				 
   
date_default_timezone_set('Asia/Singapore');
 
 $date1 = new DateTime();
 
$date2 = new DateTime($date);
$diff = $date1->diff($date2);
 


 echo('<tr>');
 if($secured==1)
 {   
  
      if($_SESSION['id']== $assignedTo || $_SESSION['id']==$assignedToTester)
	  {
	 echo('<td style="background-color:green;color:white">'.$id.'</td><td style="background-color:green;color:red"><a style="color:red" href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td style="background-color:green;color:white">'.$status.'</td><td style="background-color:green;color:white">'.$proio.'</td>'.'<td style="background-color:green;color:white">'.$user.'</td>');
	 if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		 
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
					 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			
			
			if($type == 'days')
			{
				$value=$diff->d- $remain;
				
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				   echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
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
						echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				  echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					}
				else
				{
				echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			if ($_SESSION['role'] == 'Project Manager')
			{
			echo('<td style="background-color:green;color:white"><select id="select3" onchange="javascript:copyTo(this,'.$projId.')">
             <option selected="selected">Copy To</option>');
		 
		
		
		
		    $DataBase20 = new Database();
             $strQuery20='select * from project where PK_ID != '.$projId;
			  $DataBase20->query($strQuery20);
               $Rows20 = $DataBase20->fetch_all();
			   
			   foreach($Rows20 as $Row20){

              $name20= $Row20['name_Proj'];
			  $desc20= $Row20['desc_proj'];
              $id20= $Row20['PK_ID'];
 
			   	  
             
			 
			  echo('<option class="'.$projId.'" id="'.$id20.'" value="'.$id.'">'.$name20.'</option>');
			   }
			   echo('</select></td>');
			    
 
echo('<td style="background-color:green;color:white"><a class="stylish-button" type="button" href="main.php?page=editStory&story='.$StoryId.'&proj='.$proj.'&Team='.$Team.'&projDate='.$finish.'" >Edit</a></td><td style="background-color:green;color:white"><a class="stylish-button" type="button" href="main.php?page=deleteStory&story='.$StoryId.'&proj='.$proj.'" >Delete</a></td></tr>');
}

	  }
	   else
	   {
	  echo('<td >'.$id.'</td><td style="color:red"><a style="color:red" href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td >'.$status.'</td><td >'.$proio.'</td>'.'<td >'.$user.'</td>');
			 
			if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		 
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td >0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td >0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td >'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
					 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td >0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td >0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td >'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}
			
			
			
			if($type == 'days')
			{
				$value=$diff->d- $remain;
				
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td>'.$value.' '.$type.'</td>');
					}
					else
					{
				   echo('<td>'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
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
						echo('<td>'.$value.' '.$type.'</td>');
					}
					else
					{
				  echo('<td>'.$value.' '.$type.'</td>');
					}
					}
				else
				{
				echo('<td>'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}

			 
			if ($_SESSION['role'] == 'Project Manager')
			{
			echo('<td ><select id="select3" onchange="javascript:copyTo(this,'.$projId.')">
             <option selected="selected">Copy To</option>');
		 
		
		
		
		    $DataBase20 = new Database();
             $strQuery20='select * from project where PK_ID != '.$projId;
			  $DataBase20->query($strQuery20);
               $Rows20 = $DataBase20->fetch_all();
			   
			   foreach($Rows20 as $Row20){

              $name20= $Row20['name_Proj'];
			  $desc20= $Row20['desc_proj'];
              $id20= $Row20['PK_ID'];
 
			   	  
             
			 
			  echo('<option class="'.$projId.'" id="'.$id20.'" value="'.$id.'">'.$name20.'</option>');
			   }
			   echo('</select></td>');
			    
 
echo('<td><a class="stylish-button" type="button" href="main.php?page=editStory&story='.$StoryId.'&proj='.$proj.'&Team='.$Team.'&projDate='.$finish.'" >Edit</a></td><td><a class="stylish-button" type="button" href="main.php?page=deleteStory&story='.$StoryId.'&proj='.$proj.'" >Delete</a></td>');
}
}
 }
 else
 {
       if($_SESSION['id']== $assignedTo || $_SESSION['id']==$assignedToTester)
	  {
	 echo('<td style="background-color:green;color:white">'.$id.'</td><td style="background-color:green;color:white"><a style="color:white" href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td style="background-color:green;color:white">'.$status.'</td><td style="background-color:green;color:white">'.$proio.'</td>'.'<td style="background-color:green;color:white">'.$user.'</td>');
	 if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		 
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
					 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			
			
			if($type == 'days')
			{
				$value=$diff->d- $remain;
				
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				   echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td style="background-color:green;color:white">0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
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
						echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					else
					{
				  echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
					}
					}
				else
				{
				echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td style="background-color:green;color:white">'.$value.' '.$type.'</td>');
				}
			}
			if ($_SESSION['role'] == 'Project Manager')
			{
			echo('<td style="background-color:green;color:white"><select id="select3" onchange="javascript:copyTo(this,'.$projId.')">
             <option selected="selected">Copy To</option>');
		 
		
		
		
		    $DataBase20 = new Database();
             $strQuery20='select * from project where PK_ID != '.$projId;
			  $DataBase20->query($strQuery20);
               $Rows20 = $DataBase20->fetch_all();
			   
			   foreach($Rows20 as $Row20){

              $name20= $Row20['name_Proj'];
			  $desc20= $Row20['desc_proj'];
              $id20= $Row20['PK_ID'];
 
			   	  
             
			 
			  echo('<option class="'.$projId.'" id="'.$id20.'" value="'.$id.'">'.$name20.'</option>');
			   }
			   echo('</select></td>');
			    
 
echo('<td style="background-color:green;color:white"><a class="stylish-button" type="button" href="main.php?page=editStory&story='.$StoryId.'&proj='.$proj.'&Team='.$Team.'&projDate='.$finish.'" >Edit</a></td><td style="background-color:green;color:white"><a class="stylish-button" type="button" href="main.php?page=deleteStory&story='.$StoryId.'&proj='.$proj.'" >Delete</a></td></tr>');
}

	  }
	  else
	  {
             echo('<td>'.$id.'</td><td><a href="main.php?page=storyDetails&story='.$id.'&proj='.$proj.'" >'.$name.'</a></td>'.'<td>'.$status.'</td><td>'.$proio.'</td>'.'<td>'.$user.'</td>');
	 
			if($type == 'Mins')
			{
	             
				 
				$value=$diff->i- $remain;
		      
		        if($diff->h != 0 || $diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				else
				{
					$value=abs($value);
					
					 echo('<td>'.$value.' '.$type.'</td>');
					 
					 
				}
			}
			 if($type == 'Hrs')
			{
				
				 
		     
		
				$value=$diff->h- $remain;
				 
			     if($diff->d != 0 || $diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
			   else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
				}
				else if($value==-1)
				{	 
			 
					$type="Mins";
					$value=60-$diff->i;
				 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}
			if($type == 'days')
			{
		
				$value=$diff->d- $remain;
				 
				if($diff->m != 0 || $diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}				
				else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				else if($value==-1)
				{
			    
					  
					$type="Hrs";
					 
					$value=24-$diff->h;
				 				
					if ($value==1)
					{
					 
						$type="Mins";
					    $value=60-$diff->i;
						echo('<td>'.$value.' '.$type.'</td>');
					}
					else
					{
				    echo('<td>'.$value.' '.$type.'</td>');
					}
				}
				 else
				{			
				 
					
				    $value=abs($value);
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}
			
			if($type == 'months')
			{
				
				$value=$diff->m- $remain;
				if($diff->y != 0 )
				{
				echo('<td>0 '.$type.'</td>');
				 
				}
				 else if($value > 0)
				{
				echo('<td>0 '.$type.'</td>');
				 $DataBase = new Database();
                 $strQuery ='update stories set remain_Es=0 where PK_ID='.$id;
			     $DataBase ->query($strQuery);
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
						echo('<td>'.$value.' '.$type.'</td>');
					}
					else
					{
				    echo('<td>'.$value.' '.$type.'</td>');
					}
					}
				else
				{
					echo('<td>'.$value.' '.$type.'</td>');
				}
				}
				 else
				{			
				 
					$value=abs($value);
					 
				    echo('<td>'.$value.' '.$type.'</td>');
				}
			}

			 
			if ($_SESSION['role'] == 'Project Manager')
			{
			echo('<td><select id="select3" onchange="javascript:copyTo(this,'.$projId.')">
             <option selected="selected">Copy To</option>');
			
		
		
		
		    $DataBase20 = new Database();
             $strQuery20='select * from project where PK_ID != '.$projId;
			  $DataBase20->query($strQuery20);
               $Rows20 = $DataBase20->fetch_all();
			   
			   foreach($Rows20 as $Row20){

              $name20= $Row20['name_Proj'];
			  $desc20= $Row20['desc_proj'];
              $id20= $Row20['PK_ID'];
 
			   	  
             
			 
			  echo('<option class="'.$projId.'" id="'.$id20.'" value="'.$id.'">'.$name20.'</option>');
			   }
			   echo('</select></td>');
			   
			   
			    
 
echo('<td><a class="stylish-button" type="button" href="main.php?page=editStory&story='.$StoryId.'&proj='.$proj.'&Team='.$Team.'&projDate='.$finish.'" >Edit</a></td><td><a class="stylish-button" type="button" href="main.php?page=deleteStory&story='.$StoryId.'&proj='.$proj.'" >Delete</a></td>');
}
 }
   

 
 echo('</tr>');
 }
	}
	}
	?>
    
    </tr>
    </table>
    
   

 

