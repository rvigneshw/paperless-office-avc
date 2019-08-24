<!DOCTYPE html>
<html>

<?php include_once('header.php');?>
<?php include_once('db_connection.php');?>
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
                    <li class="nav-item" role="presentation">
                            <a class="nav-link active"
                            href="dashboard.php">
                            <button class="btn btn-info">
                            Go To Dashboard
                            </button>
                            </a>
                        </li>

                    
                    </ul>
                    <span class="navbar-text actions"> 
                        <b class="text-white"><?php 
                        if(!isset($_SESSION)) 
                        { 
                            session_start(); 
                        } 
                        echo ucwords($_SESSION['user']); ?></b>
                    <a class="btn btn-warning " role="button" href="login_manager.php?logout=1">Log Out

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

<div style="margin: 0 auto;
    width:80%">
<br>
    <h2>Add Paper</h2>
<form action="paper_crud_manager.php" method="post">
    <div class="form-group ">
      <input required type="text" class="form-control" name="subject" placeholder="Subject">
    </div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <select required id="inputState" name="priority" class="form-control">
      <option value="" disabled selected>Priority</option>
        <option value="3">High</option>
        <option value="2">Moderate</option>
        <option value="1">Low</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <select required id="inputState" name="papertype" class="form-control">
        <option value="" disabled selected>Paper Type</option>
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
    </div>
    <div class="form-group col-md-4">
      <input required type="text" class="form-control" name="amount" placeholder="Amount">
    </div>
  </div>

  <div class="form-group">
    <textarea required class="form-control" id="area_editor" type="text" name="content" value="" placeholder="">
    </textarea>
  </div>
  <input type="hidden" name="addpaper" value="1">
  <button type="submit" class="btn btn-primary">Add Paper</button>
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