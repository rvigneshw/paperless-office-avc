<?php
if(!isset($_SESSION['user'])){
    header('Location: error.php');
}
?>