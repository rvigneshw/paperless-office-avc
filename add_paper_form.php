<!DOCTYPE html>
<html>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($_SESSION['user'])){
    header('Location: error.php');
}
?>
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
                            <button class="btn btn-info rounded-0">
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
                    <a class="btn btn-warning rounded-0" role="button" href="login_manager.php?logout=1">Log Out

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
<form action="paper_crud_manager.php" method="post" enctype="multipart/form-data">
    
    <div class="form-row">
    <div class="form-group col-md-9">
      <input required type="text" class="form-control" name="subject" placeholder="Subject">
    </div>
    <div class="form-group col-md-3">
      <input class="form-control" type="file" name="file[]" id="file" multiple>
    </div>
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
    <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name=ProgId content=Word.Document>
    <meta name=Generator content="Microsoft Word 14">
    <meta name=Originator content="Microsoft Word 14">
    <title></title>

    <style>
        @font-face {
            font-family: "Times New Roman";
        }
        
        @font-face {
            font-family: "宋体";
        }
        
        @font-face {
            font-family: "Calibri";
        }
        
        @font-face {
            font-family: "Wingdings";
        }
        
        @font-face {
            font-family: "Symbol";
        }
        
        @font-face {
            font-family: "Courier New";
        }
        
        @font-face {
            font-family: "Tahoma";
        }
        
        @font-face {
            font-family: "Monotype Corsiva";
        }
        
        p.MsoNormal {
            mso-style-name: Normal;
            mso-style-parent: "";
            margin: 0pt;
            margin-bottom: .0001pt;
            font-family: 'Times New Roman';
            font-size: 12.0000pt;
        }
        
        span.10 {
            font-family: Calibri;
        }
        
        span.15 {
            font-family: Calibri;
            color: rgb(0, 0, 255);
            text-decoration: underline;
            text-underline: single;
        }
        
        span.16 {
            font-family: Calibri;
        }
        
        span.17 {
            font-family: Calibri;
        }
        
        span.18 {
            font-family: Tahoma;
            mso-fareast-font-family: 'Times New Roman';
            font-size: 8.0000pt;
        }
        
        p.MsoAcetate {
            mso-style-name: "Balloon Text";
            mso-style-noshow: yes;
            margin: 0pt;
            margin-bottom: .0001pt;
            font-family: Tahoma;
            mso-fareast-font-family: 'Times New Roman';
            mso-bidi-font-family: 'Times New Roman';
            font-size: 8.0000pt;
        }
        
        p.MsoHeader {
            mso-style-name: Header;
            mso-style-noshow: yes;
            margin: 0pt;
            margin-bottom: .0001pt;
            font-family: Calibri;
            mso-bidi-font-family: 'Times New Roman';
            font-size: 11.0000pt;
        }
        
        p.MsoFooter {
            mso-style-name: Footer;
            mso-style-noshow: yes;
            margin: 0pt;
            margin-bottom: .0001pt;
            font-family: Calibri;
            mso-bidi-font-family: 'Times New Roman';
            font-size: 11.0000pt;
        }
        
        p.22 {
            mso-style-name: "No Spacing";
            margin: 0pt;
            margin-bottom: .0001pt;
            font-family: Calibri;
            mso-bidi-font-family: 'Times New Roman';
            font-size: 11.0000pt;
        }
        
        p.23 {
            mso-style-name: Default;
            margin: 0pt;
            margin-bottom: .0001pt;
            mso-layout-grid-align: none;
            text-autospace: none;
            font-family: 'Times New Roman';
            mso-fareast-font-family: Calibri;
            color: rgb(0, 0, 0);
            font-size: 12.0000pt;
        }
        
        p.24 {
            mso-style-name: "List Paragraph";
            margin-left: 36.0000pt;
            mso-add-space: auto;
            font-family: 'Times New Roman';
            font-size: 12.0000pt;
        }
        
        span.msoIns {
            mso-style-type: export-only;
            mso-style-name: "";
            text-decoration: underline;
            text-underline: single;
            color: blue;
        }
        
        span.msoDel {
            mso-style-type: export-only;
            mso-style-name: "";
            text-decoration: line-through;
            color: red;
        }
        
        table.MsoNormalTable {
            mso-style-name: "Table Normal";
            mso-style-parent: "";
            mso-style-noshow: yes;
            mso-tstyle-rowband-size: 0;
            mso-tstyle-colband-size: 0;
            mso-padding-alt: 0.0000pt 5.4000pt 0.0000pt 5.4000pt;
            mso-para-margin: 0pt;
            mso-para-margin-bottom: .0001pt;
            mso-pagination: widow-orphan;
            font-family: 'Times New Roman';
            font-size: 10.0000pt;
            mso-ansi-language: #0400;
            mso-fareast-language: #0400;
            mso-bidi-language: #0400;
        }
        
        table.MsoTableGrid {
            mso-style-name: "Table Grid";
            mso-tstyle-rowband-size: 0;
            mso-tstyle-colband-size: 0;
            mso-padding-alt: 0.0000pt 5.4000pt 0.0000pt 5.4000pt;
            mso-border-top-alt: 0.5000pt solid rgb(0, 0, 0);
            mso-border-left-alt: 0.5000pt solid rgb(0, 0, 0);
            mso-border-bottom-alt: 0.5000pt solid rgb(0, 0, 0);
            mso-border-right-alt: 0.5000pt solid rgb(0, 0, 0);
            mso-border-insideh: 0.5000pt solid rgb(0, 0, 0);
            mso-border-insidev: 0.5000pt solid rgb(0, 0, 0);
            mso-para-margin: 0pt;
            mso-para-margin-bottom: .0001pt;
            mso-pagination: widow-orphan;
            font-family: 'Times New Roman';
            font-size: 10.0000pt;
            mso-ansi-language: #0400;
            mso-fareast-language: #0400;
            mso-bidi-language: #0400;
        }
        
        @page {
            mso-page-border-surround-header: no;
            mso-page-border-surround-footer: no;
        }
        
        @page Section0 {
            margin-top: 15.9500pt;
            margin-bottom: 36.0000pt;
            margin-left: 72.0000pt;
            margin-right: 72.0000pt;
            size: 595.3500pt 842.0000pt;
            layout-grid: 18.0000pt;
        }
        
        div.Section0 {
            page: Section0;
        }
    </style>
</head>

<body style="tab-interval:36pt;">
    <!--StartFragment-->
    <div class="Section0" style="layout-grid:18.0000pt;">

        <p class=22 align=center style="text-align:center;"><span style="position:absolute;z-index:-1;left:0px;
margin-left:689.6667px;margin-top:3.8000px;width:94.0000px;
height:101.0000px;"><img width="94"  height="101"  src="CSI PP contest Permission letter 2018 (1).files/CSI PP contest Permission letter 2018 (1)1.png" ></span><span style="position:absolute;z-index:-1;left:0px;
margin-left:55.6667px;margin-top:3.8000px;width:110.0000px;
height:94.0000px;"><img width="110"  height="94"  src="CSI PP contest Permission letter 2018 (1).files/CSI PP contest Permission letter 2018 (1)2.png" ></span><b><i><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-weight:bold;font-style:italic;
font-size:26.0000pt;" >&nbsp;&nbsp;A.V.C C</span></i></b><i><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-style:italic;font-size:26.0000pt;" >ollege</span></i><b><i><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-weight:bold;font-style:italic;
font-size:26.0000pt;" >&nbsp;</span></i></b><i><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-style:italic;font-size:26.0000pt;" >of</span></i><b><i><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-weight:bold;font-style:italic;
font-size:26.0000pt;" >&nbsp;E</span></i></b><i><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-style:italic;font-size:26.0000pt;" >ngineering</span></i><b><i><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-weight:bold;font-style:italic;
font-size:19.0000pt;" ><o:p></o:p></span></i></b></p>

        <p class=22 align=center style="text-align:center;"><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
font-size:11.0000pt;">(Accredited by NAAC with &#8216;B&#8217; Grade | ISO 9001:2015 Certified Institution)</span><span style="mso-spacerun:'yes';font-family:Calibri;mso-bidi-font-family:'Times New Roman';
font-size:11.0000pt;">&nbsp;</span><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
font-size:11.0000pt;"><o:p></o:p></span></p>

        <p class=22 align=center style="text-align:center;"><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
font-size:11.0000pt;">Mannampandal, Mayiladuthurai &#8211; 609 305</span><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
font-size:11.0000pt;"><o:p></o:p></span></p>

        <p class=22 align=center style="text-align:center;"><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-size:11.0000pt;">Phone: 04364 &#8211; 227202, 224202, Extn: 249</span><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
letter-spacing:1.0000pt;font-size:11.0000pt;"><o:p></o:p></span></p>

        <p class=22 align=center style="text-align:center;line-height:114%;"><b><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
line-height:114%;font-weight:bold;font-size:14.0000pt;" >DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING</span></b><b><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
line-height:114%;font-weight:bold;font-size:14.0000pt;" ><o:p></o:p></span></b></p>

        <p class=22 align=center style="text-align:center;"><span style="position:absolute;z-index:1;left:0px;
margin-left:-98.0000px;margin-top:6.7333px;width:958.0000px;
height:8.0000px;"><img width="958"  height="8"  src="CSI PP contest Permission letter 2018 (1).files/CSI PP contest Permission letter 2018 (1)239.png" ></span><b><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
font-weight:bold;font-size:14.0000pt;" >&nbsp;</span></b><b><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
font-weight:bold;font-size:14.0000pt;" ><o:p></o:p></span></b></p>

        <p class=22 align=justify style="text-align:justify;text-justify:inter-ideograph;"><span style="mso-spacerun:'yes';font-family:'Times New Roman';mso-fareast-font-family:Calibri;
font-size:14.0000pt;"><o:p>&nbsp;</o:p></span></p>

    </div>
    <!--EndFragment-->
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