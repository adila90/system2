<?php
     $usr="root";
    $pass="";
    $db="sagile";

    mysql_connect("localhost","$usr","$pass") or die("Server Not Respond Please Try Again Later");
    mysql_select_db ("$db") or die ("Database Not Available");


    class Database
    {
        var $rs=0;

        function Database()
        {

        }
        function query($sql)
        {
                        
            $this->rs=mysql_query($sql);

            if($this->rs)
                return true;
			 
            else
            {
				return false;
            }
        }

        function fetch_row()
        {
            return mysql_fetch_row($this->rs);
        }

        function fetch_array()
        {
            return mysql_fetch_array($this->rs);
        }

        function get_num_rows()
        {
            return mysql_num_rows($this->rs);
        }
        function move_to_row($num)
        {
            if($num>=0 && $this->rs)
            {
                return mysql_data_seek($this->rs,$num);
            }
            return 1;
        }

        function get_num_columns()
        {
            return mysql_num_fields($this->rs);
        }

        function fetch_all()
        {
            $ret= array();
            $num = $this->get_num_rows();

            for($i=0;$i<$num;$i++)
            {
                array_push($ret,$this->fetch_array());
            }
            return $ret;
        }

        function get_column_names()
        {
            $nofields= mysql_num_fields($this->rs);
            $fieldnames=array();
            for($k=0;$k<$nofields;$k++)
            {
                array_push($fieldnames,mysql_field_name($this->rs,$k));
            }
            return $fieldnames;
        }

        function get_last_error()
        {
            //return mysql_get_last_message();
        }
    }



    Function CheckString($strString)
    {
        $strString = str_replace("'", "''", $strString);
        $strString = str_replace("\'", "'", $strString);
        $strString = str_replace("\\", "", $strString);

        return $strString;
    }
    function WebString($strString)
    {
                //Insert line breaks
                $strString = ereg_replace("(\r\n|\n|\r)","<br>", $strString);
                return ($strString);
    }

         //format string to display in a text field
    function TextString($strString)
    {
                $strString = ereg_replace("<br>","\r\n", $strString);
                return ($strString);
    }
    function Chk($strString)
    {
  //      $strString = str_replace("'", "\'", $strString);
        $strString = str_replace("\"", "&quot;", $strString);
        return $strString;
    }

    function word_count($str,$n = "0"){
             $m=strlen($str)/2;
             $a=1;
             while ($a<$m) {
                 $str=str_replace("  "," ",$str);
                 $a++;
                 }
             $b = explode(" ", $str);
             $i = 0; 
             foreach ($b as $v) {
                 $i++;
                 }
             if ($n==1) return $b;
             else  return $i;
    }
    function truncate($comments,$d){

    if($d>20){
      $trc_comments= implode(" ", array_slice(preg_split("/\s+/", $comments), 0, 20));
      $trc_comments.="...";
     }else{
          $trc_comments=$comments;
     }
     return $trc_comments;
    }

?>