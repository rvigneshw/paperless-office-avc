<!DOCTYPE html>
<html>

<?php 
include_once('header.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<body class="bg-dark">
    <div class="login-clean bg-dark">

        <form action="login_manager.php" method="post">
            <h5>Welcome to,</h5>
            <h3>
                Paperless Office
            </h3>
            <br>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username">
        </div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password">
        </div>
            <div class="form-group">
                <button class="btn btn-dark btn-block" type="submit">Log In

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

</body>


</html>