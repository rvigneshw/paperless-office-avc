<?php

include_once('db_connection.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include_once('auth.php');
if(isset($_GET['approve'])){
    var_dump($_GET);
    $paperId=$_GET['id'];
    if($_SESSION['dept'] <=3){
        if($_GET['approve']==1){ //Approve
            switch ($_SESSION['dept']) {
                case 1: //Secretary
                    $stsOfManager=1; $stsOfPrincipal=0; $stsOfSecretary=2;$isApproved="`isApproved`+1";
                    break;
                case 2: //Principal
                    $stsOfManager=2; $stsOfPrincipal=2; $stsOfSecretary=1;$isApproved="`isApproved`";
                    break;
                case 3: //Manager
                    $stsOfManager=2; $stsOfPrincipal=1; $stsOfSecretary=0;$isApproved="`isApproved`";;
                    break;
            }
        }elseif($_GET['approve']==2){ //Disapprove
            switch ($_SESSION['dept']) {
                case 1:  //Secretary
                    $stsOfManager=3; $stsOfPrincipal=3; $stsOfSecretary=3;
                    $isApproved="`isApproved`";
                    // UPDATE `papers` SET `isApproved`=`isApproved`+1 WHERE id=2
                    break;
                case 2:  //Principal
                    $stsOfManager=3; $stsOfPrincipal=3; $stsOfSecretary=0;$isApproved="`isApproved`";
                    break;
                case 3:  //Manager
                    $stsOfManager=3; $stsOfPrincipal=0; $stsOfSecretary=0;$isApproved="`isApproved`";
                    break;   
            }
        }

        $user=$_SESSION['user'];
        $sql="UPDATE `papers` SET 
                `isApproved`=".$isApproved.",
                `status_of_manager`='".$stsOfManager."',
                `status_of_principal`='".$stsOfPrincipal."',
                `status_of_secretary`='".$stsOfSecretary."',
                `last_modified_person`='".$user."'
                WHERE  `id`=".$paperId;
        
        if (query_custom($sql) === TRUE) {
            echo "update done";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
}


// Add paper
if(isset($_POST['addpaper'])){
    $subject=$_POST['subject'];
     $priority=$_POST['priority'];
     $papertype=$_POST['papertype'];
     $amount=$_POST['amount'];
     $content=htmlspecialchars($_POST['content'], ENT_QUOTES);
     $department=$_SESSION['dept'];
     $submittedPerson=$_SESSION['user']; 

     $sql = "INSERT INTO `papers`(
        `paper_type`,
        `department_id`,
        `subject`,
        `isApproved`,
        `content`,
        `associated_files_path`,
        `priority`,
        `paper_submitted_person`,
        `amount`,
        `status_of_manager`,
        `status_of_principal`,
        `status_of_secretary`,
        `last_modified_person`) 
        VALUES (
             '".$papertype."',
             '".$department."',
             '".$subject."',
             '". 0 ."',
             '".$content."',
             '".null."',
             '".$priority."',
             '".$submittedPerson."',
             '".$amount."',
             '". 1 ."',
             '". 0 ."',
             '". 0 ."',
             '".$submittedPerson."'             
        )
        ";
        // echo $sql;
        if (query_custom($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}


// Edit paper
if(isset($_POST['editpaper'])){
    $subject=$_POST['subject'];
    $priority=$_POST['priority'];
    $papertype=$_POST['papertype'];
    $amount=$_POST['amount'];
    $content=htmlspecialchars($_POST['content'], ENT_QUOTES);
    $paperid=$_POST['paperid'];
    $submittedPerson=$_SESSION['user']; 

     $sql ="UPDATE `papers` SET 
     `paper_type`='".$papertype."',
     `subject`='".$subject."',
     `content`='".$content."',
     `priority`='".$priority."',
     `amount`='".$amount."',
     `status_of_manager`=1,
     `status_of_principal`=0,
     `status_of_secretary`=0,
     `last_modified_person`='".$_SESSION['user']."'
      WHERE `id`=".$paperid;
        // echo $sql;
        if (query_custom($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $dept_id=$_SESSION['dept'];
    $sql="DELETE FROM `papers` WHERE `id`='".$id."' AND`department_id`='".$dept_id."'";
    if (query_custom($sql) === TRUE) {
        echo "update done";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>