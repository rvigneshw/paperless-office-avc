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
                    <li class="nav-item" role="presentation">
                            <a class="nav-link active"
                            href="dashboard.php">
                            <button class="btn btn-info rounded-0">
                            Go To Dashboard
                            </button>
                            </a>
                        </li>

                    
                    </ul>
                    <span class="navbar-text actions"> 
                        <b class="text-white">
                            <?php 
                            if(!isset($_SESSION)) 
                            { 
                                session_start(); 
                            } 
                            echo ucwords($_SESSION['user']); 
                            ?></b>
                    <a class="btn btn-warning rounded-0 " role="button" href="login_manager.php?logout=1">
                        Log Out
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

<?php include_once('header.php');?>
<?php include_once('db_connection.php');?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "SELECT * FROM `papers` WHERE `id`=".$id;

    $result = query_custom($sql);
    // echo $sql;
    if ($result->num_rows > 0) {
        $result=$result->fetch_assoc();
    }

    $paper_type=$result['paper_type'];
    $department_id=$result['department_id'];
    $subject=$result['subject'];
    $content=$result['content'];
    $priority=$result['priority'];
    $amount=$result['amount'];

    
}else{
    header('Location: error.php');
}
?>
<body>
<div style="margin: 0 auto;
    width:80%">
<br>
    <h2>Edit Paper</h2>
<form action="paper_crud_manager.php" method="post">
    <div class="form-group ">
      <input required type="text" class="form-control" name="subject" value="<?php echo $subject; ?>">
    </div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <select required  id="inputState" name="priority" class="form-control">
        <option value="" disabled selected>Priority</option>
        <option value="3"<?php if($priority==3){echo "selected";} ?>>
    High</option>
        <option value="2" <?php if($priority==2){echo "selected";} ?>>
    Moderate</option>
        <option value="1" <?php if($priority==1){echo "selected";} ?>>
    Low</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <select required  id="inputState" name="papertype" class="form-control">
      <option value="" disabled selected>Paper Type...</option>
      <?php 
        $allPaperTypeSQL="SELECT * FROM `papertype`";
        $allPaperTypes=query_custom($allPaperTypeSQL);

        if ($allPaperTypes->num_rows > 0) {
            while($row = $allPaperTypes->fetch_assoc()) {
                if($row['paper_type_id']==$result['paper_type']){
                    $selected="selected";
                }else{
                    $selected="";
                }
              echo '<option value="'.$row['paper_type_id'].'" '.$selected.'>'.$row['paper_type_name'].'</option>';
            }
          }

        ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <input required type="text" class="form-control" name="amount" value="<?php echo $amount; ?>">
    </div>
  </div>

  <div class="form-group">
    <textarea required class="form-control" id="area_editor" type="text" name="content" value="" placeholder="">
    <?php echo $content; ?>
    </textarea>
  </div>
  <input type="hidden" name="paperid" value="<?php echo $id; ?>">
  <input type="hidden" name="editpaper" value="1">
  <button type="submit" class="btn btn-primary">Edit Paper</button>
</form>
</div>


<link rel="stylesheet" href="assets/css/jodit.min.css"/>
<link rel="stylesheet" href="assets/css/joditapp.css"/>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,700,700i" rel="stylesheet">

<script src="assets/js/jodit.min.js"></script>
<script src="assets/js/prism.js"></script>
<script src="assets/js/app.js"></script>
<script>
    function hideElements() {
        $('.jodit_toolbar_btn jodit_toolbar_btn-image').hide();
        $('.jodit_toolbar_btn jodit_toolbar_btn-file').hide();
        $('.jodit_toolbar_btn jodit_toolbar_btn-video').hide();
    }
    var editor = new Jodit('#area_editor', {
        textIcons: false,
        iframe: false,
        iframeStyle: '*,.jodit_wysiwyg {color:red;}',
        height: 300,
        defaultMode: Jodit.MODE_WYSIWYG,
        observer: {
            timeout: 100
        },
        uploader: {
            url: 'https://xdsoft.net/jodit/connector/index.php?action=fileUpload'
        },
        filebrowser: {
            // buttons: ['list', 'tiles', 'sort'],
            ajax: {
                url: 'https://xdsoft.net/jodit/connector/index.php'
            }
        },
        commandToHotkeys: {
            'openreplacedialog': 'ctrl+p'
        }
        // buttons: ['symbol'],
        // disablePlugins: 'hotkeys,mobile'
    });    
</script>

</body>
</html>