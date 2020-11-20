<?php
include_once('db_connection.php');
function getSmallText($string)
{
    $string = strip_tags($string);
if (strlen($string) > 500) {

    // truncate string
    $stringCut = substr($string, 0, 500);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '.......';
}
echo $string;
}

function truncate($string, $length, $dots = "...") {
    return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
}
function get_string_for_single_status_code($code)
{
    switch($code){
        case 0:
            $string=" Not Yet Seen ";
            break;
        case 1:
            $string=" Pending ";
            break;
        case 2:
            $string=" Forwarded ";
            break;
        case 3:
            $string=" Rejected ";
            break;
        case 4:
            $string=" Rejected ";
            break;
    }
    return  $string;

}
function get_string_for_single_status_code_for_secretarty($code)
{
    switch($code){
        case 0:
            $string=" Not Yet Seen ";
            break;
        case 1:
            $string=" Pending ";
            break;
        case 2:
            $string=" Approved ";
            break;
        case 3:
            $string=" Rejected ";
            break;
        case 4:
            $string=" Rejected ";
            break;
    }
    return  $string;

}

function get_class_name_for_code($code)
{
    switch($code){
        case 0:
            $string="btn-secondary";
            break;
        case 1:
            $string=" btn-warning ";
            break;
        case 2:
            $string=" btn-success ";
            break;
        case 3:
            $string="btn-danger ";
            break;
        case 4:
            $string="btn-danger ";
            break;
    }
    return  $string;
}
function get_string_for_status_code($param_manager,$param_principal,$param_secretary)
{
    switch($param_manager){
        case 0:
            $manager_string="Not Yet Seen By Manager";
            break;
        case 1:
            $manager_string="Pending At Manager";
            break;
        case 2:
            $manager_string="Forwarded By Manager";
            break;
        case 3:
            $manager_string="Rejected By Manager";
            break;
        case 4:
            $manager_string="Rejected By Manager";
            break;
    }
    switch($param_principal){
        case 0:
            $manager_string="Not Yet Seen By Principal";
            break;
        case 1:
            $principal_string="Pending At Principal";
            break;
        case 2:
            $principal_string="Forwarded By Principal";
            break;
        case 3:
            $principal_string="Rejected By Principal";
            break;
        case 4:
            $principal_string="Rejected By Principal";
            break;
    }
    switch($param_secretary){
        case 0:
            $manager_string="Not Yet Seen By Secretary";
            break;
        case 1:
            $secretary_string="Pending At Secretary";
            break;
        case 2:
            $secretary_string="Approved By Secretary";
            break;
        case 3:
            $secretary_string="Rejected By Secretary";
            break;
        case 4:
            $manager_string="Rejected By Secretary";
            break;
    }
}

function get_approval_string($param_approve_code)
{
    switch ($param_approve_code) {
        case 0:
            $approve_String="Proposed Paper";
            break;
        case 1:
            $approve_String="Expenditure Paper";
            break;
        case 3:
            $approve_String="Archived Paper";
            break;
    }
}

function getDirContentsurl($dir, &$results = array()){
    $allFiles = scandir($dir);
    $files=array_diff($allFiles, array('.', '..'));
    foreach ($files as $key => $value) {
        echo '<a class="btn btn-primary" href="'.$dir.$value.'">'.$value.'</a><br>';
    }
}

function getFilesCount($dir)
{
    $allFiles = scandir($dir);
    return count($allFiles)-2;
}


function getCountForUser($userid,$condition,$sts,$param2=-1,$cond2=-1,$sts2=-1){
    switch ($userid) {
        case 1:
            if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
               return secretaryCount($condition,$sts,$param2,$cond2,$sts2);    
            }else{
                return secretaryCount($condition,$sts);
            }
            break;
        case 2:
            if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
               return principalCount($condition,$sts,$param2,$cond2,$sts2);    
            }else{
                return principalCount($condition,$sts);
            }
            break;
        case 3:
            if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
               return directorCount($condition,$sts,$param2,$cond2,$sts2);    
            }else{
                return directorCount($condition,$sts);
            }
            break;
        case 4:
            if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
               return managerCount($condition,$sts,$param2,$cond2,$sts2);    
            }else{
                return managerCount($condition,$sts);
            }
            break;
        default:
            if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
                return managerCount($condition,$sts,$param2,$cond2,$sts2);    
            }else{
                return managerCount($condition,$sts);
            }
            break;
    }

}

function managerCount($condition,$sts,$param2=-1,$cond2=-1,$sts2=-1){
    if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
        return getCountForPapers("`status_of_manager`",$condition,$sts,$param2,$cond2,$sts2);    
    }else{
        return getCountForPapers("`status_of_manager`",$condition,$sts);
    }
}
function directorCount($condition,$sts,$param2=-1,$cond2=-1,$sts2=-1){
    if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
        return getCountForPapers("`status_of_director`",$condition,$sts,$param2,$cond2,$sts2);    
    }else{
        return getCountForPapers("`status_of_director`",$condition,$sts);
    }
}
function secretaryCount($condition,$sts,$param2=-1,$cond2=-1,$sts2=-1){
    if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
        return getCountForPapers("`status_of_secretary`",$condition,$sts,$param2,$cond2,$sts2);    
    }else{
        return getCountForPapers("`status_of_secretary`",$condition,$sts);
    }
}
function principalCount($condition,$sts,$param2=-1,$cond2=-1,$sts2=-1){
    if($param2!=-1&&$cond2!=-1&&$sts2!=-1){
        return getCountForPapers("`status_of_principal`",$condition,$sts,$param2,$cond2,$sts2);    
    }else{
        return getCountForPapers("`status_of_principal`",$condition,$sts);
    }
}

function getCountForPapers($paramter,$condition,$value,$paramter2=-1,$condition2=-1,$value2=-1){
    $query="SELECT * FROM `papers` WHERE ".$paramter." ".$condition." ".$value;
    if($paramter2!=-1&&$condition2!=-1&&$value2!=-1){
        $query=$query." AND ".$paramter2." ".$condition2." ".$value2;
    }
    // echo "**".$query;
    // echo "Count:".get_count_for_query($query)."**</br>";

    return get_count_for_query($query);
}
?>