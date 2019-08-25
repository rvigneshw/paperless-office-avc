<!DOCTYPE html>
<html>

<?php 
include_once('header.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<style>
.vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
</style>
<body class="bg-dark vertical-center" style="height:100%;">
    <div class="bg-dark  container align-middle">

        <form class="form card bg-white align-middle" action="login_manager.php" method="post" style=" margin: auto auto;
    width:40%">
            <h5>Welcome to,</h5>
            <h3>
                Paperless Office
            </h3>
            <br>
            <div class="form-group">
                <input class="col-md-9 mb-3 form-control" type="text" name="username" placeholder="Username">
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
            unset($_SESSION['error']);
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