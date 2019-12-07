<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($_SESSION['user'])){
    header('Location: error.php');
}
?>
<?php 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include_once('displaypaper.php'); 
include_once('db_connection.php');
?>
<?php if(isset($_GET['priority'])){
    // print_r($_GET);
  if($_GET['priority']==-1){
      $priority=NOCONDITION;
  }else{
      $priority=$_GET['priority'];
  }
  if($_GET['isApproved']==-1){
      $isApproved=NOCONDITION;
  }else{
      $isApproved=$_GET['isApproved'];
  }
  if($_GET['papertype']==-1){
      $papertype=NOCONDITION;
  }else{
      $papertype=$_GET['papertype'];
  }
  if($_GET['sts_of_manager']==-1){
      $sts_of_manager=NOCONDITION;
  }else{
      $sts_of_manager=$_GET['sts_of_manager'];
  }
  if($_GET['sts_of_principal']==-1){
      $sts_of_principal=NOCONDITION;
  }else{
      $sts_of_principal=$_GET['sts_of_principal'];
  }
  if($_GET['sts_of_secretary']==-1){
      $sts_of_secretary=NOCONDITION;
  }else{
      $sts_of_secretary=$_GET['sts_of_secretary'];
  }
  if($_GET['department']==-1){
      $department=NOCONDITION;
  }else{
      $department=$_GET['department'];
  }
  if($_GET['start_date']==''){
      $start_date=NOCONDITION;
  }else{
      $start_date=$_GET['start_date'];
  }
  if($_GET['end_date']==''){
      $end_date=NOCONDITION;
  }else{
      $end_date=$_GET['end_date'];
  }
  $returned=NOCONDITION;
} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Paperless Office</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<div>
        <nav class="navbar navbar-dark text-white bg-dark navbar-expand-md navigation-clean-button">
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
                            href="dashboard.php">
                            <button class="btn btn-info rounded-0">
                            Go To Dashboard
                            </button>
                            </a>
                    </li>
                    </ul><span class="navbar-text actions"> 
                        <b class="text-white"><?php echo ucwords($_SESSION['user']); ?></b>
                      <a class="btn btn-warning text-dark rounded-0" role="button" href="login_manager.php?logout=1">Log Out
                      </a>
                </span>
                </div>
            
                </div>
        
        </nav>
    
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    </script>
    <div>
            <div class="row bg-dark">                
<form action="advanced_filter.php" class="form-inline bg-dark" method="get" style="margin: 0 auto;
    width:80%;">

<select class="form-control col-md-4" name="priority">
    <option value="-1"  selected>Priority -- Anything</option>
    <option value="3">High</option>
    <option value="2">Moderate</option>
    <option value="1">Low</option>
</select>

<select class="form-control col-md-4" name="isApproved">
    <option value="-1"  selected>Paper Approval Status--Anything</option>
    <option value="0">Proposed Paper</option>
    <option value="1">Expenditure Paper</option>
    <option value="2">Archived Paper</option>
</select>

<select class="form-control col-md-4" required  name="papertype" class="form-control col-md-4">
    <option value="-1"  selected>Paper Type --Anything</option>
        <?php 
        $allPaperTypeSQL="SELECT * FROM `papertype`";
        $allPaperTypes=query_custom($allPaperTypeSQL);
        
        if ($allPaperTypes->num_rows > 0) {
            while($row = $allPaperTypes->fetch_assoc()) {
              echo '<option value="'.$row['paper_type_id'].'">'.$row['paper_type_name'].'</option>';
            }
          }

        ?>
      </select>

<select class="form-control col-md-4" name="sts_of_manager">
    <option value="-1" selected>Manager Status --Anything</option>
    <option value="1"> Pending At Manager</option>
    <option value="2"> Approved By Manager</option>
    <option value="3"> Rejected By Manager</option>
</select>

<select class="form-control col-md-4" name="sts_of_principal">
    <option value="-1" selected>Principal Status --Anything</option>
    <option value="0" >Not Yet Seen By Principal</option>
    <option value="1"> Pending At Principal</option>
    <option value="2"> Approved By Principal</option>
    <option value="3"> Rejected By Principal</option>
</select>

<select class="form-control col-md-4" name="sts_of_secretary">
<option value="-1" selected>Secretary Status --Anything</option>
    <option value="0" >Not Yet Seen By Secretary</option>
    <option value="1"> Pending At Secretary</option>
    <option value="2"> Approved By Secretary</option>
    <option value="3"> Rejected By Secretary</option>
</select>

<select class="form-control col-md-4" required  name="department">
        <option value="-1"  selected>Department --Anything</option>
        <?php 
        $allDeptSQL="SELECT * FROM `department` WHERE `dept_id`>3";
        $allDepts=query_custom($allDeptSQL);

        if ($allDepts->num_rows > 0) {
            while($row = $allDepts->fetch_assoc()) {
              echo '<option value="'.$row['dept_id'].'">'.$row['department_name'].'</option>';
            }
          }
        ?>
</select>                        


<input placeholder="Start Date -- Anything" class="form-control col-md-4" type="text" 
onfocus="(this.type='date')"  name="start_date"/>


<input placeholder="End Date -- Anything" class="form-control col-md-4" type="text" 
onfocus="(this.type='date')"  name="end_date"  />

<button class="btn btn-primary  btn-block" type="submit">Submit</button>

</form>
        </div>
        <div class="row">
<?php
if(isset($_GET['priority'])){
                $param_priority=$priority;
                $param_isApproved=$isApproved;
                $param_paper_type=$papertype;
                $param_sts_of_manager=$sts_of_manager;
                $param_sts_of_principal=$sts_of_principal;
                $param_sts_of_secretary=$sts_of_secretary;
                $param_department=$department;
                $param_start_date=$start_date;
                $param_end_date=$end_date;
                $param_returned=$returned;

                
                // echo "dept".$department."priority".$priority."\nisApproved".$isApproved."\npapertype".$papertype."\nsts_of_manager".$sts_of_manager."\nsts_of_principal".$sts_of_principal."\nsts_of_secretary".$sts_of_secretary."\nstart_date".$start_date."\nend_date".$end_date."\n";

                echo display_cards($param_priority,$param_isApproved,$param_paper_type,$param_sts_of_manager,$param_sts_of_principal,$param_sts_of_secretary,$param_department,$param_start_date,$param_end_date,$param_returned);

                // default_view(1,3);
}
     ?>   
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>

