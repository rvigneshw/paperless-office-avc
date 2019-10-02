<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($_SESSION['user'])){
    header('Location: error.php');
}
?>
<?php

define("NOCONDITION", -1);
function default_view($paper_sts,$dept_code){

    // echo $dept_code;
    // echo $paper_sts;
    $p_priority=NOCONDITION;
    $p_isApproved=NOCONDITION;
    $p_paper_type=NOCONDITION;
    $p_start_date=NOCONDITION;
    $p_end_date=NOCONDITION;

    if($dept_code<=3){
        $p_department=NOCONDITION;
    }else{
        $p_department=$dept_code;
        switch ($paper_sts) { 
            case 1://For Pending Paper
                $p_sts_of_manager=1;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=NOCONDITION;
                break;
            case 2://For Approved Paper
                $p_sts_of_manager=2;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=NOCONDITION;
                break;
            case 3://For Rejected Paper
                $p_sts_of_manager=3;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=NOCONDITION;
                break;
            case 4://For Rejected Paper
                $p_sts_of_manager=NOCONDITION;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=NOCONDITION;
                $p_isApproved=2;
                break;
        }
        
    }

    if($paper_sts==1){

        switch ($dept_code) { //For Pending Paper
            case 1: //For secretary 
                $p_sts_of_manager=NOCONDITION;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=1;
                break;
            case 2: //For Principal
                $p_sts_of_manager=NOCONDITION;
                $p_sts_of_principal=1;
                $p_sts_of_secretary=NOCONDITION;
                break;
            case 3: //For Manager
                $p_sts_of_manager=1;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=NOCONDITION;
                break;
        }

    }elseif ($paper_sts==2) {
        
        switch ($dept_code) { //For Approved Paper
            case 1: //For secretary 
                $p_sts_of_manager=NOCONDITION;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=NOCONDITION;
                $p_isApproved=1;
                break;
            case 2: //For Principal
                $p_sts_of_manager=NOCONDITION;
                $p_sts_of_principal=2;
                $p_sts_of_secretary=NOCONDITION;
                break;
            case 3: //For Manager
                $p_sts_of_manager=2;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=NOCONDITION;
                break;
        }

    }elseif($paper_sts==3) {

        switch ($dept_code) { //For Rejected Paper
            case 1: //For secretary 
                $p_sts_of_manager=NOCONDITION;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=3;
                break;
            case 2: //For Principal
                $p_sts_of_manager=NOCONDITION;
                $p_sts_of_principal=3;
                $p_sts_of_secretary=NOCONDITION;
                break;
            case 3: //For Manager
                $p_sts_of_manager=3;
                $p_sts_of_principal=NOCONDITION;
                $p_sts_of_secretary=NOCONDITION;
                break;
        }
    }elseif ($paper_sts==4) {
        $p_isApproved=2;
    }

    

    display_cards($p_priority,$p_isApproved,$p_paper_type,$p_sts_of_manager,$p_sts_of_principal,$p_sts_of_secretary,$p_department,$p_start_date,$p_end_date);




}


function display_cards($param_priority,$param_isApproved,$param_paper_type,
$param_sts_of_manager,$param_sts_of_principal,$param_sts_of_secretary,$param_department,$param_start_date,$param_end_date)
{
    if(empty($conn)){
        include_once('db_connection.php');
    }

include_once('header.php');
include_once('functions.php');

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$select_query ="SELECT * FROM paper_all WHERE paper_all.id IN ( SELECT id FROM `papers` WHERE "; 

if($param_department==NOCONDITION){
    $department_id_condtion=" 1 AND ";
}else{
    $department_id_condtion=" `department_id`='".$param_department."' AND ";
}

if($param_isApproved==NOCONDITION){
    $isApproved_condtion=" `isApproved` <=2 AND ";
}else{
    $isApproved_condtion=" `isApproved`='".$param_isApproved."' AND ";
}

if($param_priority==NOCONDITION){
    $priority_condtion=" 1 AND ";
}else{
    $priority_condtion=" `priority`='".$param_priority."' AND ";
}

if($param_sts_of_manager==NOCONDITION){
    $status_of_manager_condtion=" 1 AND ";
}else{
    $status_of_manager_condtion=" `status_of_manager`='".$param_sts_of_manager."' AND ";
}
if($param_sts_of_principal==NOCONDITION){
    $status_of_principal_condtion=" 1 AND ";
}else{
    $status_of_principal_condtion=" `status_of_principal`='".$param_sts_of_principal."' AND "; 
}
if($param_sts_of_secretary==NOCONDITION){
    $status_of_secretary_condtion=" 1 AND ";
}else{
    $status_of_secretary_condtion=" `status_of_secretary`='".$param_sts_of_secretary."' AND ";
}

if($param_start_date==NOCONDITION && $param_end_date ==NOCONDITION){
    $updated_at_condtion=" 1 AND";
}elseif($param_start_date==NOCONDITION){
    $updated_at_condtion=" Date(updated_at) < '".$param_end_date."' AND";
}
elseif($param_end_date==NOCONDITION){
    $updated_at_condtion=" Date(updated_at) >  '".$param_start_date."' AND";
}else{
    $updated_at_condtion=" Date(updated_at) BETWEEN  '".$param_start_date."' AND '".$param_end_date."' AND";
}

if($param_paper_type==NOCONDITION){
    $paper_type_condtion=" 1 )";
}else{
    $paper_type_condtion=" `paper_type`='".$param_paper_type."')";
}

$sql=$select_query.$department_id_condtion.$isApproved_condtion.$priority_condtion.$status_of_manager_condtion.$status_of_principal_condtion.$status_of_secretary_condtion.$updated_at_condtion.$paper_type_condtion;

echo $sql;
// die();

$result = query_custom($sql);

if ($result->num_rows > 0) {
    echo '<center><div class="card-columns">';
    while($row = $result->fetch_assoc()) {

        if ($row['isApproved']==0) {
            $paperTypePill='<button type="button" class="btn btn-primary">
            P
            </button>';
        }elseif ($row['isApproved']==1) {
            $paperTypePill='<button type="button" class="btn btn-warning">
            E
            </button>';
        }elseif ($row['isApproved']==2) {
            $paperTypePill='<button type="button" class="btn btn-danger">
            A
            </button>';
        }

        if($row['priority']==3){
            $prioritytag='<button type="button" class="btn btn-danger">H</button>';
        }elseif($row['priority']==2){
            $prioritytag='<button type="button" class="btn btn-warning">M</button>';
        }else{
            $prioritytag='<button type="button" class="btn btn-success">L</button>';
        }

        if ($row['paper_submitted_person']==$_SESSION['user']) {
            $editButtonTag='<a href="edit_paper_form.php?id='.$row['id'].
            '" class="btn btn-warning">Edit</a>';
        }else{
            $editButtonTag='';
        }

        $status_of_manager_code=$row['status_of_manager'];
        $status_of_principal_code=$row['status_of_principal'];
        $status_of_secretary_code=$row['status_of_secretary'];

        $status_of_manager_stmt=get_string_for_single_status_code($status_of_manager_code);
        $status_of_principal_stmt=get_string_for_single_status_code($status_of_principal_code);
        $status_of_secretary_stmt=get_string_for_single_status_code($status_of_secretary_code);

        $status_of_manager_btn_class=get_class_name_for_code($status_of_manager_code);
        $status_of_principal_btn_class=get_class_name_for_code($status_of_principal_code);
        $status_of_secretary_btn_class=get_class_name_for_code($status_of_secretary_code);

        $url="view_single_paper.php?id=".$row['id'];
        $ts=$row['created_at'];
        $date=date("F j, Y, g:i a",strtotime($ts));
        $content=truncate($row['content'],20);
        echo '
            <div class="card mb-4 border-dark" style="width: 25rem; margin:1rem;">
            <div class="card-header bg-dark text-white ">
            <div class="btn-group btn-group" role="group" aria-label="...">
            '.$paperTypePill.'
            '.$prioritytag.'
            </div>
            <div class="btn-group " role="group" aria-label="...">
            <button type="button" class="btn btn-dark border-white ">
            '.$row['department_name']  .'
            </button>

            <button type="button" class="btn btn-dark border-white text-right">
            Rs:'.$row['amount'].'
            </button>
            </div>
            <div class="btn-group btn-group" role="group" aria-label="...">
            <div class="btn-group btn-group" role="group" aria-label="...">
            '.$editButtonTag.'
            <a class="btn btn-primary" href="'.$url.'">
            View
            </a>
            </div>
            </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">'.$row['paper_type_name'].'<b> / </b>'.$row['subject'].'</h5>
                <p class="card-text">'.$content.'</p>
                <button type="button" class=" btn btn-outline-primary">
                    <b>At : </b>'. $date.'<br>
                    <b>By : </b>'.$row['paper_submitted_person'].'
                </button >
            </div>
            <div class="card-footer bg-transparent">
            <div class="btn-group btn-group" role="group" aria-label="...">
            <button type="button" class="btn '.$status_of_manager_btn_class.'">
            Manager:</br>'.$status_of_manager_stmt.'
            </button>
            <button type="button" class="btn '.$status_of_principal_btn_class.'">
            Principal:</br>'.$status_of_principal_stmt.'
            </button>
            <button type="button" class="btn '.$status_of_secretary_btn_class.'">
            Secretary:</br>'.$status_of_secretary_stmt.'
            </button>

            </div>
            </div>
            </div>';
    }
    echo '</div></center>';
} else {
    echo "0 results";
}


}
?>