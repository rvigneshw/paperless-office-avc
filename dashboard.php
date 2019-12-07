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
<?php include_once('header.php'); ?>
<?php include_once('functions.php'); ?>
<?php

$userid=$_SESSION['dept'];
$approvedPapersCount=getCountForUser($userid,"=",2);
$pendingPapersCount=getCountForUser($userid,"=",1,"`returned_for_query`","=",0);
$rejectedPapersCount=getCountForUser($userid,"=",3);
$returnedPapersCount=getCountForUser($userid,"=",1,"`returned_for_query`",">",0);
$deptCountCSE=getCountForUser($userid,"=",1,"`department_id`","=",11);
$deptCountCivil=getCountForUser($userid,"=",1,"`department_id`","=",10);
$deptCountECE=getCountForUser($userid,"=",1,"`department_id`","=",5);
$deptCountEEE=getCountForUser($userid,"=",1,"`department_id`","=",7);
$deptCountMech=getCountForUser($userid,"=",1,"`department_id`","=",6);
$deptCountICE=getCountForUser($userid,"=",1,"`department_id`","=",8);
$deptCountIT=getCountForUser($userid,"=",1,"`department_id`","=",9);
$LowPriorityCount=getCountForUser($userid,"=",1,"`priority`","=",1);
$ModPriorityCount=getCountForUser($userid,"=",1,"`priority`","=",2);
$HighPriorityCount=getCountForUser($userid,"=",1,"`priority`","=",3);

?>
<!DOCTYPE html>
<html>
<body>
<style>
.mar10{
  margin:2px;
}
.shadow-card{
  box-shadow: 5px 6px 7px  #000000aa;
}
.rounded-pilll{
  box-shadow: 5px 6px 7px  #000000aa;
  border-radius:50px;
}
.navc{
  margin:10px;
  box-shadow: 5px 6px 7px  #000000aa;
  border-radius:50px;
}

.gradient{
    box-shadow: 5px 6px 7px  #000000aa;
    border-radius:50px;
    background: rgb(6,255,169);
    background: linear-gradient(160deg, rgba(6,255,169,1) 0%, rgba(11,157,203,1) 100%);
}
.gradient_dept{
    box-shadow: 5px 6px 7px  #000000aa;
    border-radius:50px;
    background: rgb(6,145,255);
background: linear-gradient(160deg, rgba(6,145,255,1) 0%, rgba(188,11,203,1) 100%);
}
.gradient_pri{
    box-shadow: 5px 6px 7px  #000000aa;
    border-radius:50px;
    background: rgb(177,118,177);
background: linear-gradient(160deg, rgba(177,118,177,1) 0%, rgba(155,163,11,1) 100%);
}
.gradient_pen{
    background: rgb(200,213,39);
background: linear-gradient(160deg, rgba(200,213,39,1) 0%, rgba(203,114,11,1) 100%);
}
.gradient_ret{
    background: rgb(39,213,182);
background: linear-gradient(160deg, rgba(39,213,182,1) 0%, rgba(11,79,203,1) 100%);
}
</style>
<div>
        <nav class="navbar navc navbar-dark bg-dark text-white navbar-expand-md navigation-clean-button">
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
                    if ($_SESSION['dept']>4) { ?>
                        <li class="nav-item" role="presentation">
                        <a 
                        href="add_paper_form.php">
                        <button class="btn btn-primary rounded-pilll">
                        Add a Paper
                        </button>
                        </a>
                    </li>
                    <?php
                    }else{

                    }
                    if(isset($_GET['view'])){
                    ?>
                    <li class="nav-item" role="presentation">
                        <a 
                        href="dashboard.php">
                        <button class="btn btn-primary rounded-pilll">
                        Go To Dashboard
                        </button>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <li class="nav-item" role="presentation">
                        <a 
                        href="dashboard.php?view=1">
                        <button class="btn btn-warning rounded-pilll">
                        Pending Papers [<?php echo $pendingPapersCount;?>]
                        </button>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a 
                        href="dashboard.php?view=2">
                        <button class="btn btn-success rounded-pilll">
                        Approved Papers [<?php echo $approvedPapersCount;?>]
                        </button>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a 
                        href="dashboard.php?view=3">
                        <button class="btn btn-danger rounded-pilll">
                        Rejected Papers [<?php echo $rejectedPapersCount;?>]
                        </button>
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle btn btn-light rounded-pilll" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More Options
                        </a>
                        <div class="dropdown-menu border-0 bg-transparent" aria-labelledby="navbarDropdownMenuLink">

                            <a  href="advanced_filter.php">
                            <button class="btn btn-warning rounded-pilll mar10" style="width:200px;">
                            Advanced Filters
                            </button>
                            </a>

                            <a  href="dashboard.php?view=4">
                            <button class="btn btn-warning rounded-pilll mar10" style="width:200px;">
                            Returned Papers [<?php echo $returnedPapersCount;?>]
                            </button>
                            </a>

                            <a  href="dashboard.php?view=4">
                            <button class="btn btn-warning rounded-pilll mar10" style="width:200px;">
                            Archived Papers
                            </button>
                            </a>
                        </div>
                    </li>
                    </ul>
                    <span class="navbar-text actions"> 
                        <b class="text-white"><?php echo ucwords($_SESSION['user']); ?></b>
                    <a class="btn btn-warning text-dark rounded-pilll" role="button" href="login_manager.php?logout=1">Log Out

                    </a>
                    </span>
                </div>
            
                </div>
        
        </nav>
    
    </div>
    <a href=""></a>

<?php

$dept=$_SESSION['dept'];
if(!isset($_GET['view'])){

    echo  '<div class="card-deck" style="margin:10px;">
    <div class="card gradient">
      <div class="card-body">
        <h5 class="card-title">Approved Papers</h5>
        <p class="card-text text-white">You have '.$approvedPapersCount.' Approved Papers</p>
        <a href="dashboard.php?view=2">
        <button class="btn gradient_dept text-white btn-block">View them</button>
        </a>
      </div>
    </div>

    <div class="card gradient">
            <div class="card-body">
        <h5 class="card-title">Rejected Papers</h5>
        <p class="card-text text-white">You have '.$rejectedPapersCount.' Rejected Papers</p>
        <a href="dashboard.php?view=3">
        <button class="btn text-white gradient_dept btn-block">View them</button>
        </a>
      </div>
      </div>
      <div class="card gradient">
            <div class="card-body">
        <h5 class="card-title">Pending Papers</h5>
        <p class="card-text text-white">You have '.$pendingPapersCount.' Pending Papers</p>
        <a href="dashboard.php?view=1">
        <button class="btn text-white gradient_dept btn-block">View them</button>
        </a>
      </div>
    </div>
    <div class="card gradient">
          <div class="card-body">
        <h5 class="card-title">Returned Papers</h5>
        <p class="card-text text-white">You have '.$returnedPapersCount.' Returned Papers</p>
        <a href="dashboard.php?view=4">
        <button class="btn text-white gradient_dept btn-block">View them</button>
        </a>
      </div>
  </div>
    </div>
    </br>
    ';
    if ($_SESSION['dept']<=4){
        echo '
    <div class="card-deck" style="margin:10px;">
    <div class="card gradient_dept">
      <div class="card-body">
        <h5 class="card-title text-white">CSE Papers</h5>
        <p class="card-text text-white">You have '.$deptCountCSE.' Pending CSE Papers</p>
        <a href="dashboard.php?view=11">
        <button class="btn  btn-block gradient">View them</button>
        </a>
      </div>
    </div>
    <div class="card gradient_dept">
      <div class="card-body">
        <h5 class="card-title text-white">ECE Papers</h5>
        <p class="card-text text-white">You have '.$deptCountECE.' Pending ECE Papers</p>
        <a href="dashboard.php?view=5">    
        <button class="btn  btn-block gradient">View them</button>
        </a>
      </div>
    </div>
    <div class="card gradient_dept">
      <div class="card-body">
        <h5 class="card-title text-white">EEE Papers</h5>
        <p class="card-text text-white">You have '.$deptCountEEE.' Pending EEE Papers</p>
        <a href="dashboard.php?view=7">    
        <button class="btn  btn-block gradient">View them</button>
        </a>
      </div>
    </div>
    <div class="card gradient_dept">
      <div class="card-body">
        <h5 class="card-title text-white">MECH Papers</h5>
        <p class="card-text text-white">You have '.$deptCountMech.' Pending MECH Papers</p>
        <a href="dashboard.php?view=6">    
        <button class="btn  btn-block gradient">View them</button>
        </a>
      </div>
    </div>
    <div class="card gradient_dept">
      <div class="card-body">
        <h5 class="card-title text-white">ICE Papers</h5>
        <p class="card-text text-white">You have '.$deptCountICE.' Pending ICE Papers</p>
        <a href="dashboard.php?view=8">
        <button class="btn  btn-block gradient">View them</button>
        </a>
      </div>
    </div>
    <div class="card gradient_dept">
      <div class="card-body">
        <h5 class="card-title text-white">CIVIL Papers</h5>
        <p class="card-text text-white">You have '.$deptCountCivil.' Pending CIVIL Papers</p>
        <a href="dashboard.php?view=10">
        <button class="btn  btn-block gradient">View them</button>
        </a>
      </div>
    </div>
    </a>
    </div>
    </br>
    <!--<div class="card-deck" style="margin:10px;">
    
    <div class="card gradient_pri">
      <div class="card-body">
        <h5 class="card-title text-white">LOW Priority Papers</h5>
        <p class="card-text text-white">You have '.$LowPriorityCount.' Pending LOW Priority Papers</p>
        <a href="dashboard.php?view=low">
        <button class="btn ">View them</button>
        </a>
      </div>
    </div>
    <div class="card gradient_pri">
      <div class="card-body">
        <h5 class="card-title text-white">MODERATE Priority Papers</h5>
        <p class="card-text text-white">You have '.$ModPriorityCount.' Pending MODERATE Priority Papers</p>
        <a href="dashboard.php?view=med">
        <button class="btn ">View them</button>
        </a>
      </div>
    </div>
    <div class="card gradient_pri">
      <div class="card-body">
        <h5 class="card-title text-white">HIGH Priority Papers</h5>
        <p class="card-text text-white">You have '.$HighPriorityCount.' Pending HIGH Priority Papers</p>
        <a href="dashboard.php?view=high">
        <button class="btn ">View them</button>
        </a>
      </div>
    </div>
    </div>-->
    ';
    }
    echo '</div>';
    
}

if(isset($_GET['view'])){
    if($_GET['view']==1){
        default_view(1,$dept);
    }elseif($_GET['view']==2){
        default_view(2,$dept);
    }elseif ($_GET['view']==3){
        default_view(3,$dept);
    }elseif ($_GET['view']==4){
        default_view(4,$dept);
        /////////////
    }elseif($_GET['view']==5){
        default_view(1,$dept,5);
    }elseif ($_GET['view']==6){
        default_view(1,$dept,5);
    }elseif ($_GET['view']==7){
        default_view(1,$dept,7);
    }elseif($_GET['view']==8){
        default_view(1,$dept,8);
    }elseif ($_GET['view']==9){
        default_view(1,$dept,9);
    }elseif ($_GET['view']==10){
        default_view(1,$dept,10);
    }elseif ($_GET['view']==11){
        default_view(1,$dept,11);
    }
    else{
        echo "invalid";
    }
}


?>

