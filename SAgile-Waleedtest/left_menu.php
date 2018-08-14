 

<? if($User_Id=="" || $User_Id==NULL){ ?>

<div class="container">
   <b class="rtop">
     <b class="r1"></b>
     <b class="r2"></b>
     <b class="r3"></b>
     <b class="r4"></b>
  </b>

<table width="100%" class="clstd">
 <tr>
   <td align="center">
     <h3 > <a  style="color:black" href="main.php">  All Projects  </a></h3>
     <ol class="tree">
		 
		 
		<li>
			<label  onclick="javascript:main();" style="font-family: Century Gothic, sans-serif;margin-left:5px;" for="folder5">My projects</label> <input  type="checkbox"   checked   id="folder5" /> 
			<ol>
            
            <?php
			
		 
             $DataBase = new Database();
             $strQuery4='select * from project';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['name_Proj'];
			   $id= $Row['PK_ID'];
            echo('<li ><label  onclick="backlog('.$id.');">'.$name.'</label> <input  checked type="checkbox"/>');
			
			$strQuery10='select * from sub where FK_Proj_Id='.$id;
			$DataBase10 = new Database();
			  $DataBase10->query($strQuery10);
               $Rows10 = $DataBase10->fetch_all();
			   $count2=$DataBase10->get_num_rows();
			 
			   if($count2 > 0)
			   {
				   echo('<ol>');
			   foreach($Rows10 as $Row10){
				   $name10= $Row10['name_sub'];
			       $id10= $Row10['PK_ID'];
				   
				    echo('<li class="file"><label  onclick="Sbacklog('.$id10.','.$id.');">'.$name10.'</label> <input  checked type="checkbox" /></li>');
				   
				   
			   }
			   
			   echo('</ol>');
			   }
			   echo('</li>');

             
			   }
			?>
				 
				 
			</ol>
		</li>
	</ol>
   </td>
 </tr>
 
</table>
<b class="rbottom">
     <b class="r4"></b>
     <b class="r3"></b>
     <b class="r2"></b>
     <b class="r1"></b>
  </b>
</div>
<br/>
<?}else{?>

<div class="container">
   <b class="rtop">
     <b class="r1"></b>
     <b class="r2"></b>
     <b class="r3"></b>
     <b class="r4"></b>
  </b>

 
<b class="rbottom">
     <b class="r4"></b>
     <b class="r3"></b>
     <b class="r2"></b>
     <b class="r1"></b>
  </b>
</div>
<br/>

<? } ?>

<div class="container">
   <b class="rtop">
     <b class="r1"></b>
     <b class="r2"></b>
     <b class="r3"></b>
     <b class="r4"></b>
  </b>

<table width="100%" class="clstd">
 <tr>
   <td align="center">
     <h3> All Iteration</h3>
     
  <ol class="tree">
		 
		 
		 <li>
			<label for="folder2">My Iteration</label> <input  checked  type="checkbox" id="folder2" /> 
			<ol>
				 <?php
			$DataBase0 = new Database();
             $strQuery3='select * from project';
			  $DataBase0->query($strQuery3);
               $Rows0 = $DataBase0->fetch_all();
			   
			   foreach($Rows0 as $Row0){

              $name0= $Row0['name_Proj'];
			   $id0= $Row0['PK_ID'];
              
               echo('<li ><label  onclick="manageVersion('.$id0.');">'.$name0.'</label> <input  checked type="checkbox"/>');

			   
		 
             $DataBase = new Database();
             $strQuery4='select * from version WHERE FK_Proj_ID='.$id0;
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   $count=$DataBase->get_num_rows();
			   if($count > 0)
			   {
			   echo('<ol>');
			   foreach($Rows as $Row){

              $name= $Row['release_name'];
			   $id= $Row['PK_ID'];
              
               echo('<li class="file"><label onclick="manageSprint('.$id0.','.$id.');">'.$name.'</label> <input  checked type="checkbox"/>');
			    $DataBase2 = new Database();
             $strQuery5='select * from sprint where FK_Version_ID='.$id;
			  $DataBase2->query($strQuery5);
               $Rows2 = $DataBase2->fetch_all();
			    $count2=$DataBase2->get_num_rows();
				 if($count2 > 0)
				 {
			   echo('<ol>');
			   foreach($Rows2 as $Row2){

			   
              $name2= $Row2['sprint_name'];
			   $id2= $Row2['PK_ID'];
             
               echo('<li class="file" ><a href="main.php?page=Sbacklog&proj='.$id0.'&Spr='.$id2.'" style="padding-left:9px;color:#400000 ;font-family: Century Gothic, sans-serif; " >'.$name2.'</a> </li>');
			   }
			   echo('</ol>');
				 }
			   echo('</li>');
			   }
			   echo('</ol></li>');
			   }
			   }
			?> 
				 
                
			</ol>
		</li>
	</ol>
   </td>
   
 </tr>
  
</table>
<b class="rbottom">
     <b class="r4"></b>
     <b class="r3"></b>
     <b class="r2"></b>
     <b class="r1"></b>
  </b>
</div>
<br/>
<div class="container">
   <b class="rtop">
     <b class="r1"></b>
     <b class="r2"></b>
     <b class="r3"></b>
     <b class="r4"></b>
  </b>

<table width="100%" class="clstd">
 <tr>
   <td align="center">
     <h3>All Teams </h3>
     
     <ol class="tree">
		 
		 
		<li>
			<label  onclick="javascript:Teams();" style="font-family: Century Gothic, sans-serif;margin-left:5px;" for="folder5">My Teams</label> <input  type="checkbox"   checked   id="folder5" /> 
			<ol>
            
            <?php
			
		 
             $DataBase = new Database();
             $strQuery4='select * from teams';
			  $DataBase->query($strQuery4);
               $Rows = $DataBase->fetch_all();
			   
			   foreach($Rows as $Row){

              $name= $Row['Team_name'];
			   $id= $Row['PK_ID'];
            echo('<li ><label  onclick="Team('.$id.');">'.$name.'</label> <input  checked type="checkbox"/>');
			
			$strQuery10='select * from users where FK_Team_Id='.$id;
			$DataBase10 = new Database();
			  $DataBase10->query($strQuery10);
               $Rows10 = $DataBase10->fetch_all();
			   $count2=$DataBase10->get_num_rows();
			 
			   if($count2 > 0)
			   {
				   echo('<ol>');
			   foreach($Rows10 as $Row10){
				   $name10= $Row10['role'];
			       $id10= $Row10['PK_ID'];
				      echo('<li class="file" ><a href="#" style="padding-left:9px;color:#400000 ;font-family: Century Gothic, sans-serif; " >'.$name10.'</a> </li>');
				   
				   
			   }
			   
			   echo('</ol>');
			   }
			   echo('</li>');

             
			   }
			?>
				 
				 
			</ol>
		</li>
	</ol>
   </td>
   
 </tr>
 
  
</table>
<b class="rbottom">
     <b class="r4"></b>
     <b class="r3"></b>
     <b class="r2"></b>
     <b class="r1"></b>
  </b>
</div>
<br/>
 
 