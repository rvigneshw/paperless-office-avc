<?php
		error_reporting(0);
		session_start();
		if ($_COOKIE["auth"] != "admin_in"){header("location:"."./");}
			include("includes/connect.php");
			include("includes/data.php");
			?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="author" content="@housamz">

				<meta name="description" content="Mass Admin Panel">
				<title>Paperless Office Admin Panel</title>
	
				<!-- Latest compiled and minified CSS -->
				<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

				<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">
				
				<!-- Custom CSS -->
				<link rel="stylesheet" href="includes/style.css">
				<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
					
			</head>

			<body>

			<div class="wrapper">
				<!-- Sidebar Holder -->
				<nav id="sidebar" class="bg-primary">
					<div class="sidebar-header">
						<h3>
							Paperless Office Admin Panel<br>
							<i id="sidebarCollapse" class="glyphicon glyphicon-circle-arrow-left"></i>
						</h3>
						<strong>
							Paperless Office<br>
							<i id="sidebarExtend" class="glyphicon glyphicon-circle-arrow-right"></i>
						</strong>
						
					</div><!-- /sidebar-header -->

					<!-- start sidebar -->
					<ul class="list-unstyled components">
						<li>
							<a href="home.php" aria-expanded="false">
								<i class="glyphicon glyphicon-home"></i>
								Home
							</a>
						</li>
			
			<li><a href="department.php"> <i class="glyphicon glyphicon-education"></i>Department <span class="pull-right"><?=counting("department", "id")?></span></a></li>

<li><a href="expenses_table.php"> <i class="glyphicon glyphicon-usd"></i>Expenses Table <span class="pull-right"><?=counting("expenses_table", "id")?></span></a></li>

<li><a href="fund_tables.php"> <i class="glyphicon glyphicon-usd"></i>Fund Tables <span class="pull-right"><?=counting("fund_tables", "id")?></span></a></li>


<li><a href="papers.php"> <i class="glyphicon glyphicon-file"></i>Papers <span class="pull-right"><?=counting("papers", "id")?></span></a></li>

<li><a href="papertype.php"> <i class="glyphicon glyphicon-folder-open"></i>Papertype <span class="pull-right"><?=counting("papertype", "id")?></span></a></li>

<li><a href="queries.php"> <i class="glyphicon glyphicon-bullhorn"></i>Queries <span class="pull-right"><?=counting("queries", "id")?></span></a></li>

<li><a href="users.php"> <i class="glyphicon glyphicon-user"></i>Users <span class="pull-right"><?=counting("users", "id")?></span></a></li>

<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
				</ul>
				
			</nav><!-- /end sidebar -->

			<!-- Page Content Holder -->
			<div id="content">