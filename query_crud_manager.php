<?php
include_once('db_connection.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_POST['addanswer'])){

    $answerText="<b>".$_SESSION['user']." Answered:</b>";    
    $response=$answerText.htmlspecialchars($_POST["response"], ENT_QUOTES);
    $id=$_POST["id"];
    $paperid=$_POST["paperid"];

    $sql = "UPDATE `queries` SET `answer`='".$response."' WHERE `id`=".$id;
    
//     `status_of_manager`=1,
// `status_of_director`=0,
// `status_of_principal`=0,
// `status_of_secretary`=0,
    if (query_custom($sql) === TRUE) {
        if($_SESSION['dept']==1){
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`status_of_secretary`=1,`resubmission_count`=`resubmission_count`+1 WHERE `id`=".$paperid;
        }elseif($_SESSION['dept']==2){
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`status_of_principal`=1,`resubmission_count`=`resubmission_count`+1 WHERE `id`=".$paperid;
        }elseif($_SESSION['dept']==3){
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`status_of_director`=1,`resubmission_count`=`resubmission_count`+1 WHERE `id`=".$paperid;
        }elseif($_SESSION['dept']==4){
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`status_of_manager`=1,`resubmission_count`=`resubmission_count`+1 WHERE `id`=".$paperid;
        }else{
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`resubmission_count`=`resubmission_count`+1 WHERE `id`=".$paperid;
        }
        
        if (query_custom($returnPaperForQuery) === TRUE) {
        $url="view_single_paper.php?id=".$paperid;
        header('Location:'.$url);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
}

if(isset($_POST['addquery'])){
    
    $askText="<b>".$_SESSION['user']." Asked:</b>";
    $query=$askText.htmlspecialchars($_POST["query"], ENT_QUOTES);
    $addquery=$_POST["addquery"];
    $paperid=$_POST["paperid"];

    $sql = "INSERT INTO `queries`(`paper_id`, `query`) VALUES (
        '".$paperid."',
        '".$query."'
    )";
    
    if (query_custom($sql) === TRUE) {
        if($_SESSION['dept']==1){
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`status_of_secretary`=4 WHERE `id`=".$paperid;
        }elseif($_SESSION['dept']==2){
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`status_of_principal`=4 WHERE `id`=".$paperid;
        }elseif($_SESSION['dept']==3){
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`status_of_director`=4 WHERE `id`=".$paperid;
        }elseif($_SESSION['dept']==4){
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1 ,`status_of_manager`=4 WHERE `id`=".$paperid;
        }else{
            $returnPaperForQuery="UPDATE `papers` SET `returned_for_query`=`returned_for_query`-1  WHERE `id`=".$paperid;
        }

        if (query_custom($returnPaperForQuery) === TRUE) {
        $url="view_single_paper.php?id=".$paperid;
        header('Location:'.$url);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>