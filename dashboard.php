<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 }
if(!isset($_SESSION['user'])){
    header('Location: error.php');
}
?>
<?php include_once('displaypaper.php'); ?>

<!DOCTYPE html>
<html>
<body>
<div>
        <nav class="navbar navbar-dark bg-dark text-white navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="#">
                Paperless Office
            </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigatio
                n</span><span class="navbar-toggler-icon">

            </span>
        </button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                    <?php 
                    if($_SESSION['user']){

                    }
                    if ($_SESSION['dept']>3) { ?>
                        <li class="nav-item" role="presentation">
                        <a 
                        href="add_paper_form.php">
                        <button class="btn btn-primary rounded-0">
                        Add a Paper
                        </button>
                        </a>
                    </li>
                    <?php
                    }else{

                    }
                    ?>
                    <li class="nav-item" role="presentation">
                        <a 
                        href="dashboard.php?view=1">
                        <button class="btn btn-warning rounded-0">
                        Pending Papers
                        </button>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a 
                        href="dashboard.php?view=2">
                        <button class="btn btn-success rounded-0">
                        Approved Papers
                        </button>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a 
                        href="dashboard.php?view=3">
                        <button class="btn btn-danger rounded-0">
                        Rejected Papers
                        </button>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle btn btn-light rounded-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More Options
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="advanced_filter.php">
                            <button class="btn btn-info rounded-0">
                            Advanced Filters
                            </button>
                            </a>
                            <a class="dropdown-item" href="dashboard.php?view=4">
                            <button class="btn btn-warning rounded-0">
                            Archived Papers
                            </button>
                            </a>
                        </div>
                    </li>
                    </ul>
                    <span class="navbar-text actions"> 
                        <b class="text-white"><?php echo ucwords($_SESSION['user']); ?></b>
                    <a class="btn btn-warning text-dark rounded-0" role="button" href="login_manager.php?logout=1">Log Out

                    </a>
                    </span>
                </div>
            
                </div>
        
        </nav>
    
    </div>

<?php

$dept=$_SESSION['dept'];
if(!isset($_GET['view'])){
    header("location: dashboard.php?view=1");
}

if($_GET['view']==1){
    default_view(1,$dept);
}elseif($_GET['view']==2){
    default_view(2,$dept);
}elseif ($_GET['view']==3) {
    default_view(3,$dept);
}elseif ($_GET['view']==4) {
    default_view(4,$dept);
}else{
    echo "invalid";
}



?>