<?  session_start();    
  $flag=intval($_REQUEST['flag']);
  $do=$_REQUEST['do'];
  $pb=$_REQUEST['pb'];
  $job_id=intval($_REQUEST['job_id']);  

  if($do=="delete") // delete
    {
      $strQuery= "delete
                   from jt_jobs
                 where PK_ID=".intval($job_id);
      $DataBase->query($strQuery);
    }
  if($pb!="") // update
    {
      $strQuery= "update jt_jobs
                    set
                   publish=".htmlentities($pb,ENT_QUOTES)."
                 where PK_ID=$job_id
                ";
      $DataBase->query($strQuery);
    }
?>

<? if($flag!=1) { ?>
<div class="container">
   <b class="rtop">
     <b class="r1"></b>
     <b class="r2"></b>
     <b class="r3"></b>
     <b class="r4"></b>
  </b>
<table width="100%" class="clstd" border="0" valign="top">
<tr >
   <td align="center">
    <b> Welcome Dear Employer - Your Jobs List </b>
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
<? } ?>
<br/>


<? if($flag==1) { ?>
<div class="container">
   <b class="rtop">
     <b class="r1"></b>
     <b class="r2"></b>
     <b class="r3"></b>
     <b class="r4"></b>
  </b>
  <table class=clstd><tr>
  <td align=center><b>Job has been Posted Online</b></td>
  </tr>
  <tr>
  <td colspan="2" align="center"><a href="index.php"> <b> Click Here To See </b> </a> 
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
<? }

if($User_PKId!=""){
  $strQuery = "select PK_ID, job_title, job_desc, last_date, publish, salary, ok, no_of_app
                 from jt_jobs
               where employer_id=".intval($User_PKId)."
               order by PK_ID desc
              ";
  $DataBase->query($strQuery);
  $num_row = $DataBase->get_num_rows();
}

 if($num_row > 0){ //if jobs added then show jobs list?>
<table width="100%" class="clstd" border="0" valign="top">
<tr>
  <td colspan="4" align="right"> <b> <a href="index.php">Home</a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?page=edit_emp">Edit Profile</a>
  &nbsp;&nbsp;&nbsp;  <a href="index.php?page=job_form"><b>Post New Jobs</a> </b>
  </td>
</tr>
</table>

<table width="100%" class="clstd_dgray" border="0" valign="top">
<tr class="clstbl2" height="25">
   <td class="clstd_red" width="2%" align="center">&nbsp;</td>
   <td class="clstd_red" width="2%" align="center">&nbsp;</td>
   <td class="clstd_red" width="55%"><b>Title & Description</b></td>
   <td class="clstd_red" width="15%" align=center><b># of Applications</b></td>
   <td class="clstd_red" width="14%"><b>Status</b></td>
   <td class="clstd_red" width="12%" align="center"><b>Last Date</b></td>
</tr>

<?



      $Records = $DataBase->fetch_all();
      foreach($Records as $vals)
      {
        $job_id     = $vals['PK_ID'];
        $job_title  = $vals['job_title'];
        $job_desc  = $vals['job_desc'];
        $publish = $vals['publish'];
        $last_date = $vals['last_date'];
        $salary_id = $vals['salary'];
        $ok = $vals['ok'];
        $no_of_app = $vals['no_of_app'];

        $job_desc= htmlspecialchars_decode($job_desc);


        if($ok==0){
          $ok="<span style=\"color:red\">Not Approved</span>";
          $publish="";
        }elseif($ok==1){
            $ok="<span style=\"color:green\">Approved</span>";

            if($publish==1){
               $publish="<span style=\"color:green\">Published</span><a href=index.php?page=emp_job_list&pb=2&job_id=$job_id> Click to UnPublish</a>";
            }elseif($publish==2){
               $publish="UnPublished<a href=index.php?page=emp_job_list&pb=1&job_id=$job_id> Click here to Publish</a>";
            }
        }


        $strQuery = "select name
                        from jt_salary
                      where ID=".intval($salary_id);
        $DataBase->query($strQuery);
        $Rec = $DataBase->fetch_array();
        $job_salary = $Rec['name'];

        echo"
        <tr>
           <td class=\"clstbl1\" valign=\"top\"> <a href=\"index.php?page=job_edit&job_id=$job_id\">Edit Job</a></td>
           <td class=\"clstbl1\" valign=\"top\"> <a href=\"index.php?page=emp_job_list&do=delete&job_id=$job_id\" onclick=\"return confirm('Are you sure you want to delete this job?')\"> Delete Job</a></td>
           <td class=\"clstbl1\"><u><b> <a href=\"index.php?page=job_edit&job_id=$job_id\">$job_title</a></b></u><br><br>
             $job_desc <br>
             <span style=\"color:green\">Offered Salary (Rs):</span> &nbsp;$job_salary
           </td>
           <td class=\"clstbl1\" align=\"center\" valign=\"top\">$no_of_app </td>
           <td class=\"clstbl1\" align=\"center\" valign=\"top\">$ok $publish </td>
           <td class=\"clstbl1\" align=\"center\" valign=\"top\">$last_date</td>
        </tr>
        ";

        $strQuery= "select *
                     from jt_job_seeker
                   where comments = ".intval($job_id);
        $DataBase->query($strQuery);
        $Rows = $DataBase->fetch_all();

        foreach($Rows as $Row){

          $email= $Row['email'];
          $name= $Row['name'];
          $date_apply= $Row['added_date'];

          if($prev_job_id!=$job_id){ // only show this heading one time for each job
          echo"
             <tr id=\"$job_id\" style=\"display:none\">
              <td colspan=2>&nbsp;</td>
              <td style=color:darkblue> <b>Applicant Name(s)</b> </td>
              <td style=color:darkblue > <b>Applicant Email Address</b> </td>
              <td style=color:darkblue> <b>Date Applied</b> </td>
              <td>&nbsp;</td>
             </tr>
           ";
          }//if($prev_job_id!=$job_id){
          echo"
             <tr id=\"$job_id\" style=\"display:none\">
              <td colspan=2>&nbsp;</td>
              <td style=color:darkblue> $name</td>
              <td style=color:darkblue > $email </td>
              <td style=color:darkblue>$date_apply</td> <td>&nbsp;</td>
             </tr>
        ";
        $prev_job_id=$job_id;
       }// end foreach($Rows as $Row){
    }

?>
</table>
<? }else{
          echo"<p class=\"clstd10\"> Thank You. You have successfully registered.<br>";
         echo"<p class=\"clstd10\"><a href=\"index.php?page=job_form\"><b>Please click Here to start Posting Jobs!!</b></a>";
}//end if?>

<script type="text/javascript">
function displayRow(theTable)
{
     obj = document.getElementsByTagName('TR');
     for (i=0; i<obj.length; i++)
     {
        if (obj[i].id == theTable)
         {
          if(obj[i].style.display == 'block')
          {
            obj[i].style.display = 'none';
          }else  if(obj[i].style.display == 'none')
          {
            obj[i].style.display = 'block';
          }
         }
     }
     return false;
}
</script>