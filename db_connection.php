<?php
function query_custom($query){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "paperless_office";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($query);
    return $result;
    $conn->close();
}
function  get_count_for_query($query){
    $result=query_custom($query);
    $count=mysqli_num_rows($result);
    mysqli_free_result($result);
    return $count;
}

?>