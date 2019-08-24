<?php
   include("db_connection.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   if (isset($_GET['logout'])) {
       if ($_GET['logout']==1) {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        unset($_SESSION['user']);
        unset($_SESSION['dept']);
        header("location: index.php");
       }
   }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM `users` WHERE `username`='".$myusername."' AND `password`='".$mypassword."'";
    //   echo $sql;
    //   die();
        $result = query_custom($sql);
        // print_r($result);
        // die();
        if ($result->num_rows ==1) {
            $row=$result->fetch_assoc();
            $_SESSION['error']="";
            $_SESSION['user'] = $myusername;
            $_SESSION['dept'] = $row['department'];
            header("location: dashboard.php?view=1");
        }else{
            $_SESSION['error']="Wrong Credentials";
            header("location: index.php");
        }

}
?>