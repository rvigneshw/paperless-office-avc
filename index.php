<!DOCTYPE html>
<html>

<?php 
include_once('header.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<body class="bg-dark" style="height:100%;">
    <div class="login-clean bg-dark">

        <form action="login_manager.php" method="post">
            <h5>Welcome to,</h5>
            <h3>
                Paperless Office
            </h3>
            <br>
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-dark btn-block rounded-0" type="submit">Log In

            </button>
            </div>
        <?php
        if(isset($_SESSION['error'])){
            if($_SESSION['error']!=""){
                echo   '<div>
                '.$_SESSION['error'].'
                </div>'; 
            }
        }
        ?>
        </form>
    
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    </script>

<nav class="navbar fixed-bottom navbar-dark text-white text-center bg-dark">
  Designed and Developed with &#128151 by Department of CSE: 2017-2021
</nav>
</body>


</html>