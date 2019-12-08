<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($_SESSION['user'])){
    header('Location: error.php');
}
?>
<!DOCTYPE html>
<html>

<?php include_once('header.php');?>
<?php include_once('db_connection.php');?>
<?php include_once('functions.php');?>
<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "SELECT * FROM `paper_all` WHERE `id`=".$id;

    $result = query_custom($sql);
    // echo $sql;
    if ($result->num_rows > 0) {
        $result=$result->fetch_assoc();
    }else{
        header('Location: error.php');
    }
    $paper_type_name=$result['paper_type_name'];
    $department_name=$result['department_name'];
    $subject=$result['subject'];
    $isApproved=$result['isApproved'];
    $content=$result['content'];
    $amount=$result['amount'];
    $associated_files_path=$result['associated_files_path'];
    $ResubmissionCount=$result['resubmission_count'];
    // var_dump($result);
    $commentsSql="SELECT * FROM `queries` WHERE `paper_id`=".$id;
    $comment_data = query_custom($commentsSql);
    $fileCount=getFilesCount($associated_files_path);
    if($fileCount==0){
        $showFilesText="No Files to show";
    }else{
        $showFilesText="Show All ".$fileCount." Files";
    }
    
}else{
    header('Location: error.php');
}

?>
<body>
<div>
        <nav class="navbar navc navbar-dark bg-dark text-white navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="#">
                Paperless Office

            </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">
            Toggle navigation
            </span><span class="navbar-toggler-icon">

            </span>
        </button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                    <?php 
                    if($result['paper_submitted_person']==$_SESSION['user']){ ?>
                        <li class="nav-item " role="presentation">
                        <a  href="edit_paper_form.php?id=<?php echo  $id; ?>">
                        <button class="btn btn-warning rounded-pilll">
                            Edit Paper
                        </button>
                        </a>
                        </li>
                        <li class="nav-item " role="presentation">
                        <a  href="paper_crud_manager.php?delete=<?php echo  $id; ?>">
                        <button class="btn btn-danger rounded-pilll">
                            Delete Paper
                        </button>
                        </a>
                        </li>
                    <?php 
                    }else{
                    ?>
                        <li class="nav-item " role="presentation">
                        <a  href="paper_crud_manager.php?approve=1&id=<?php echo  $id; ?>">
                            <button class="btn btn-success rounded-pilll">
                            Approve Paper
                            </button>
                        </a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a  href="paper_crud_manager.php?approve=2&id=<?php echo  $id; ?>">
                            <button class="btn btn-danger rounded-pilll">
                            Reject Paper
                            </button>
                        </a>
                        </li>
                    <?php } ?>
                        <li class="nav-item" role="presentation">
                            <a 
                            href="dashboard.php">
                            <button class="btn btn-primary rounded-pilll">
                            Go To Dashboard
                            </button>
                            </a>
                        </li>
                        <!-- <li class="dropdown nav-item"> -->
                        <!-- <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Dropdown 
                        </a>
                            <div id="dropdown" class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="#">First Item

                            </a>
                            <a class="dropdown-item" role="presentation" href="#">Second Item

                            </a>
                            <a class="dropdown-item" role="presentation" href="#">Third Item

                            </a>
                        </div>
                         -->
                        <!-- </li> -->
                    
                    </ul>
                    <span class="navbar-text actions"> 
                        <b class="text-white"><?php echo ucwords($_SESSION['user']); ?></b>
                    <a class="btn btn-warning rounded-pilll" role="button" href="login_manager.php?logout=1">Log Out</a>
                    </span>
                </div>
            
                </div>
        
        </nav>
    
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 border-white col-md-6 col-lg-8 offset-sm-0">
<br>
                <table class="table shadow-card table-dark border-white" style="border-radius:10px;">
                    <tbody>
                        <tr>
                            <td><b> Subject: </b></td>
                            <td><?php echo $subject; ?></td>
                        </tr>
                        <tr>
                            <td><b> Department Name: </b></td>
                            <td><?php echo $department_name; ?></td>
                        </tr>
                        <tr>
                            <td><b> Paper Type: </b></td>
                            <td><?php echo $paper_type_name; ?></td>
                        </tr>
                        <tr>
                            <td><b> Amount: </b></td>
                            <td><?php echo $amount; ?></td>
                        </tr>
                        <tr>
                            <td><b> Resubmission Count: </b></td>
                            <td><?php echo $ResubmissionCount; ?></td>
                        </tr>
                        <tr>
                            <td><b> Files:  </b></td>
                            <td >
                            <button onclick="collapseToggle()" class="btn rounded-pilll btn-primary" type="button" >
                                <?php echo $showFilesText; ?>
                            </button>
                            <div class="collapse" id="collapseExample">
                            <?php echo getDirContentsurl($associated_files_path); ?>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php echo htmlspecialchars_decode($content); ?>
                </div>
                <div class="col-sm-3 col-md-6 col-lg-4">
                <br>
                <div class="card shadow-card bg-dark" style="width: 25rem;border-radius:100px; text-align:center;margin:10px;">
                    <form 
                    method="post" action="query_crud_manager.php" 
                    class="form  
                    text-white mb-2" 
                    style="width: 25rem;">
                    <div class="form-group mx-sm-3 mb-2">
                    <br>
                    <h4>Add a new Query</h4>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                    <input required type="text" class="form-control rounded-pilll" name="query" placeholder="Query">
                    <input type="hidden" name="addquery" value="1">
                    <input type="hidden" name="paperid" value="<?php
                    echo $id;
                    ?>">
                    </div>
                    <button type="submit" class="btn rounded-pilll btn-primary mb-1 mx-sm-3">
                    Post Query
                    </button>
                    </form>
                </div>
                    <?php
                    if ($comment_data->num_rows > 0) {
                        while($single_comment = $comment_data->fetch_assoc()) {
                            if($single_comment['answer']==""){
                                $btn_txt="Answer";
                                $open_toggle_txt=" </br>[Un Answered]";
                                $open_toggle_button_color=" btn-danger ";
                                
                            }else{
                                $btn_txt="Update Answer";
                                $open_toggle_txt="</br>[Answered]";
                                $open_toggle_button_color=" btn-success ";
                            }
                            if($single_comment['answer']!=""){

                                $answerTag='<li class="list-group-item bg-dark text-white"><b>Answered At :</b> '.date("F j, Y, g:i a",strtotime($single_comment['updated_at'])).'</li>
                                <li class="list-group-item">'.$single_comment['answer'].'</li>';
                            }else{
                                $answerTag='<li class="list-group-item">No answers yet</li>';
                            }
echo
'
<button style="width:25rem;" class="btn rounded-pilll mar10'.$open_toggle_button_color.'" type="button" data-toggle="collapse" data-target="#queryid'.$single_comment['id'].'" aria-expanded="false" aria-controls="queryid'.$single_comment['id'].'">
    <b>Open Query:</b><br>'.$single_comment['query'].$open_toggle_txt.'
  </button>
  <div class="collapse " id="queryid'.$single_comment['id'].'">
<div class="card rounded-pilll bg-dark"  style="width: 25rem;">
  
    <div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-dark text-white"><b>Created At :</b> '.date("F j, Y, g:i a",strtotime($single_comment['created_at'])).'</li>
        <li class="list-group-item " style="broder-radius:100px;">'.$single_comment['query'].'</li>
        '.$answerTag.'
    </ul>
    </div>
  
    
        <form method="post" action="query_crud_manager.php" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" required class="rounded-pilll form-control" name="response" placeholder="Answer/Response">
            </div>
            <input type="hidden" name="id" value="'.$single_comment['id'].'">
            <input type="hidden" name="addanswer" value="1">
            <input type="hidden" name="paperid" value="'.$id.'">
            <button type="submit" class="rounded-pilll btn btn-primary mb-2">
            '.$btn_txt.'
            </button>
        </form>

</div>
</div>
';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
function collapseToggle() {
    $('#collapseExample').collapse('toggle');
}
</script>

</html>