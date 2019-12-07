<?php
include_once('db_connection.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include_once('auth.php');
if(isset($_GET['approve'])){

    $paperId=$_GET['id'];

    if($_SESSION['dept'] <=4){
        echo "inside if";
        if($_GET['approve']==1){ //Approve
            echo "inside if2";
            switch ($_SESSION['dept']) {
                case 1: //Secretary
                    $stsOfManager=1;$stsOfDirector=0; $stsOfPrincipal=0; $stsOfSecretary=2;$isApproved="`isApproved`+1";
                    break;
                case 2: //Principal
                    $stsOfManager=2;$stsOfDirector=2; $stsOfPrincipal=2; $stsOfSecretary=1;$isApproved="`isApproved`";
                    break;
                case 3: //Director
                    $stsOfManager=2;$stsOfDirector=2; $stsOfPrincipal=1; $stsOfSecretary=0;$isApproved="`isApproved`";
                    break;
                case 4: //Manager
                    echo "hello";
                    $stsOfManager=2;$stsOfDirector=1; $stsOfPrincipal=0; $stsOfSecretary=0;$isApproved="`isApproved`";
                    break;
            }
        }elseif($_GET['approve']==2){ //Disapprove
            switch ($_SESSION['dept']) {
                case 1:  //Secretary
                    $stsOfManager=3;$stsOfDirector=3; $stsOfPrincipal=3; $stsOfSecretary=3;
                    $isApproved="`isApproved`";
                    // UPDATE `papers` SET `isApproved`=`isApproved`+1 WHERE id=2
                    break;
                case 2:  //Principal
                    $stsOfManager=3;$stsOfDirector=3; $stsOfPrincipal=3; $stsOfSecretary=0;$isApproved="`isApproved`";
                    break;
                case 3:  //Director
                    $stsOfManager=3;$stsOfDirector=3; $stsOfPrincipal=0; $stsOfSecretary=0;$isApproved="`isApproved`";
                    break;   
                case 4:  //Manager
                    $stsOfManager=3;$stsOfDirector=0; $stsOfPrincipal=0; $stsOfSecretary=0;$isApproved="`isApproved`";
                    break;   
            }
        }

        $user=$_SESSION['user'];
        $sql="UPDATE `papers` SET 
                `isApproved`=".$isApproved.",
                `status_of_manager`='".$stsOfManager."',
                `status_of_director`='".$stsOfDirector."',
                `status_of_principal`='".$stsOfPrincipal."',
                `status_of_secretary`='".$stsOfSecretary."',
                `last_modified_person`='".$user."'
                WHERE  `id`=".$paperId;

        if (query_custom($sql) === TRUE) {
            $check_whether_paper_to_add_to_funds_table="SELECT * FROM `papers` WHERE `isApproved`=2 AND `id`=".$paperId;
            $fund_res=query_custom($check_whether_paper_to_add_to_funds_table);
            if ($fund_res->num_rows > 0) {
                var_dump($fund_res);
                $status = $fund_res->fetch_assoc();
                
                $amount=$status['amount'];
                $budget_id=2;
                $insert_to_expense='INSERT INTO `expenses_table`(`paper_id`, `budget_id`, `amount`, `created_at`, `updated_at`) VALUES ('.$paperId.','.$budget_id.','.$amount.',NOW(),NOW())';
                // echo $insert_to_expense;
                query_custom($insert_to_expense);
                //     echo "good";
                //     die();
                // }else{
                //     echo "bad";
                //     die();
                // }
            }
            header("location: dashboard.php");
        } else {
            echo "Error: " . $sql . "<br>";
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
     $current_timestamp = time();
     $associated_files_path="uploads/".$subject."-".$current_timestamp."/";
     $countfiles = count($_FILES['file']['name']);

     if (!file_exists($associated_files_path)) {
        mkdir($associated_files_path, 0777, true);
    }

    for($i=0;$i<$countfiles;$i++){
        $filepath=$associated_files_path.basename($_FILES["file"]["name"][$i]);
        move_uploaded_file($_FILES['file']['tmp_name'][$i],$filepath);
        echo $filepath;
    }

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
        `status_of_director`,
        `status_of_principal`,
        `status_of_secretary`,
        `last_modified_person`,
        `returned_for_query`
        ) 
        VALUES (
             '".$papertype."',
             '".$department."',
             '".$subject."',
             '". 0 ."',
             '".$content."',
             '".$associated_files_path."',
             '".$priority."',
             '".$submittedPerson."',
             '".$amount."',
             '". 1 ."',
             '". 0 ."',
             '". 0 ."',
             '". 0 ."',
             '".$submittedPerson."',
             '". 0 ."'           
        )
        ";
        // echo $sql;
        if (query_custom($sql) === TRUE) {
            
            header("location: dashboard.php");
        } else {
            echo "Error: " . $sql . "<br>" ;
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

    $current_timestamp = time();
    $associated_files_path="uploads/".$subject."-".$current_timestamp."/";
    $countfiles = count($_FILES['file']['name']);

    if (!file_exists($associated_files_path)) {
       mkdir($associated_files_path, 0777, true);
   }

   for($i=0;$i<$countfiles;$i++){
       $filepath=$associated_files_path.basename($_FILES["file"]["name"][$i]);
       move_uploaded_file($_FILES['file']['tmp_name'][$i],$filepath);
       echo $filepath;
   }

     $sql ="UPDATE `papers` SET 
     `paper_type`='".$papertype."',
     `subject`='".$subject."',
     `content`='".$content."',
     `priority`='".$priority."',
     `amount`='".$amount."',
     `associated_files_path`='".$associated_files_path."',
     `status_of_manager`=1,
     `status_of_director`=0,
     `status_of_principal`=0,
     `status_of_secretary`=0,
     `last_modified_person`='".$_SESSION['user']."'
      WHERE `id`=".$paperid;
        // echo $sql;
        if (query_custom($sql) === TRUE) {
            header("location: dashboard.php");
        } else {
            echo "Error: " . $sql . "<br>";
        }
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $dept_id=$_SESSION['dept'];
    $sql="DELETE FROM `papers` WHERE `id`='".$id."' AND`department_id`='".$dept_id."'";
    if (query_custom($sql) === TRUE) {
        header("location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>";
    }
}

?>