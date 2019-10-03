<?php
include_once('db_connection.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_POST['addanswer'])){

    $answerText=$_SESSION['user']." Answered:";    
    $response=htmlspecialchars($answerText.$_POST["response"], ENT_QUOTES);
    $id=$_POST["id"];
    $paperid=$_POST["paperid"];

    $sql = "UPDATE `queries` SET `answer`='".$response."' WHERE `id`=".$id;
    
    if (query_custom($sql) === TRUE) {
        $url="view_single_paper.php?id=".$paperid;
        header('Location:'.$url);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
}

if(isset($_POST['addquery'])){
    
    
    $askText=$_SESSION['user']." Asked:";
    $query=htmlspecialchars($askText.$_POST["query"], ENT_QUOTES);
    $addquery=$_POST["addquery"];
    $paperid=$_POST["paperid"];

    $sql = "INSERT INTO `queries`(`paper_id`, `query`) VALUES (
        '".$paperid."',
        '".$query."'
    )";
    
    if (query_custom($sql) === TRUE) {
        $url="view_single_paper.php?id=".$paperid;
        header('Location:'.$url);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>