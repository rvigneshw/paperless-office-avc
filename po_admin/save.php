<?php
		include("includes/connect.php");

		$cat = $_POST['cat'];
		$cat_get = $_GET['cat'];
		$act = $_POST['act'];
		$act_get = $_GET['act'];
		$id = $_POST['id'];
		$id_get = $_GET['id'];

		
				if($cat == "department" || $cat_get == "department"){
					$dept_id = mysqli_real_escape_string($link,$_POST["dept_id"]);
$department_name = mysqli_real_escape_string($link,$_POST["department_name"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `department` (  `dept_id` , `department_name` ) VALUES ( '".$dept_id."' , '".$department_name."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `department` SET  `dept_id` =  '".$dept_id."' , `department_name` =  '".$department_name."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `department` WHERE id = '".$id_get."' ");
					}
					header("location:"."department.php");
				}
				
				if($cat == "expenses_table" || $cat_get == "expenses_table"){
					$paper_id = mysqli_real_escape_string($link,$_POST["paper_id"]);
$budget_id = mysqli_real_escape_string($link,$_POST["budget_id"]);
$amount = mysqli_real_escape_string($link,$_POST["amount"]);
$created_at = mysqli_real_escape_string($link,$_POST["created_at"]);
$updated_at = mysqli_real_escape_string($link,$_POST["updated_at"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `expenses_table` (  `paper_id` , `budget_id` , `amount` , `created_at` , `updated_at` ) VALUES ( '".$paper_id."' , '".$budget_id."' , '".$amount."' , '".$created_at."' , '".$updated_at."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `expenses_table` SET  `paper_id` =  '".$paper_id."' , `budget_id` =  '".$budget_id."' , `amount` =  '".$amount."' , `created_at` =  '".$created_at."' , `updated_at` =  '".$updated_at."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `expenses_table` WHERE id = '".$id_get."' ");
					}
					header("location:"."expenses_table.php");
				}
				
				if($cat == "fund_tables" || $cat_get == "fund_tables"){
					$budget_id = mysqli_real_escape_string($link,$_POST["budget_id"]);
$deparment_id = mysqli_real_escape_string($link,$_POST["deparment_id"]);
$year_of_allocation = mysqli_real_escape_string($link,$_POST["year_of_allocation"]);
$amount = mysqli_real_escape_string($link,$_POST["amount"]);
$created_at = mysqli_real_escape_string($link,$_POST["created_at"]);
$updated_at = mysqli_real_escape_string($link,$_POST["updated_at"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `fund_tables` (  `budget_id` , `deparment_id` , `year_of_allocation` , `amount` , `created_at` , `updated_at` ) VALUES ( '".$budget_id."' , '".$deparment_id."' , '".$year_of_allocation."' , '".$amount."' , '".$created_at."' , '".$updated_at."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `fund_tables` SET  `budget_id` =  '".$budget_id."' , `deparment_id` =  '".$deparment_id."' , `year_of_allocation` =  '".$year_of_allocation."' , `amount` =  '".$amount."' , `created_at` =  '".$created_at."' , `updated_at` =  '".$updated_at."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `fund_tables` WHERE id = '".$id_get."' ");
					}
					header("location:"."fund_tables.php");
				}
				
				if($cat == "paper_all" || $cat_get == "paper_all"){
					$paper_type_name = mysqli_real_escape_string($link,$_POST["paper_type_name"]);
$department_name = mysqli_real_escape_string($link,$_POST["department_name"]);
$subject = mysqli_real_escape_string($link,$_POST["subject"]);
$isApproved = mysqli_real_escape_string($link,$_POST["isApproved"]);
$content = mysqli_real_escape_string($link,$_POST["content"]);
$associated_files_path = mysqli_real_escape_string($link,$_POST["associated_files_path"]);
$priority = mysqli_real_escape_string($link,$_POST["priority"]);
$created_at = mysqli_real_escape_string($link,$_POST["created_at"]);
$paper_submitted_person = mysqli_real_escape_string($link,$_POST["paper_submitted_person"]);
$amount = mysqli_real_escape_string($link,$_POST["amount"]);
$status_of_manager = mysqli_real_escape_string($link,$_POST["status_of_manager"]);
$status_of_principal = mysqli_real_escape_string($link,$_POST["status_of_principal"]);
$status_of_secretary = mysqli_real_escape_string($link,$_POST["status_of_secretary"]);
$last_modified_person = mysqli_real_escape_string($link,$_POST["last_modified_person"]);
$updated_at = mysqli_real_escape_string($link,$_POST["updated_at"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `paper_all` (  `paper_type_name` , `department_name` , `subject` , `isApproved` , `content` , `associated_files_path` , `priority` , `created_at` , `paper_submitted_person` , `amount` , `status_of_manager` , `status_of_principal` , `status_of_secretary` , `last_modified_person` , `updated_at` ) VALUES ( '".$paper_type_name."' , '".$department_name."' , '".$subject."' , '".$isApproved."' , '".$content."' , '".$associated_files_path."' , '".$priority."' , '".$created_at."' , '".$paper_submitted_person."' , '".$amount."' , '".$status_of_manager."' , '".$status_of_principal."' , '".$status_of_secretary."' , '".$last_modified_person."' , '".$updated_at."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `paper_all` SET  `paper_type_name` =  '".$paper_type_name."' , `department_name` =  '".$department_name."' , `subject` =  '".$subject."' , `isApproved` =  '".$isApproved."' , `content` =  '".$content."' , `associated_files_path` =  '".$associated_files_path."' , `priority` =  '".$priority."' , `created_at` =  '".$created_at."' , `paper_submitted_person` =  '".$paper_submitted_person."' , `amount` =  '".$amount."' , `status_of_manager` =  '".$status_of_manager."' , `status_of_principal` =  '".$status_of_principal."' , `status_of_secretary` =  '".$status_of_secretary."' , `last_modified_person` =  '".$last_modified_person."' , `updated_at` =  '".$updated_at."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `paper_all` WHERE id = '".$id_get."' ");
					}
					header("location:"."paper_all.php");
				}
				
				if($cat == "papers" || $cat_get == "papers"){
					$paper_type = mysqli_real_escape_string($link,$_POST["paper_type"]);
$department_id = mysqli_real_escape_string($link,$_POST["department_id"]);
$subject = mysqli_real_escape_string($link,$_POST["subject"]);
$isApproved = mysqli_real_escape_string($link,$_POST["isApproved"]);
$content = mysqli_real_escape_string($link,$_POST["content"]);
$associated_files_path = mysqli_real_escape_string($link,$_POST["associated_files_path"]);
$priority = mysqli_real_escape_string($link,$_POST["priority"]);
$created_at = mysqli_real_escape_string($link,$_POST["created_at"]);
$paper_submitted_person = mysqli_real_escape_string($link,$_POST["paper_submitted_person"]);
$amount = mysqli_real_escape_string($link,$_POST["amount"]);
$status_of_manager = mysqli_real_escape_string($link,$_POST["status_of_manager"]);
$status_of_principal = mysqli_real_escape_string($link,$_POST["status_of_principal"]);
$status_of_secretary = mysqli_real_escape_string($link,$_POST["status_of_secretary"]);
$last_modified_person = mysqli_real_escape_string($link,$_POST["last_modified_person"]);
$updated_at = mysqli_real_escape_string($link,$_POST["updated_at"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `papers` (  `paper_type` , `department_id` , `subject` , `isApproved` , `content` , `associated_files_path` , `priority` , `created_at` , `paper_submitted_person` , `amount` , `status_of_manager` , `status_of_principal` , `status_of_secretary` , `last_modified_person` , `updated_at` ) VALUES ( '".$paper_type."' , '".$department_id."' , '".$subject."' , '".$isApproved."' , '".$content."' , '".$associated_files_path."' , '".$priority."' , '".$created_at."' , '".$paper_submitted_person."' , '".$amount."' , '".$status_of_manager."' , '".$status_of_principal."' , '".$status_of_secretary."' , '".$last_modified_person."' , '".$updated_at."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `papers` SET  `paper_type` =  '".$paper_type."' , `department_id` =  '".$department_id."' , `subject` =  '".$subject."' , `isApproved` =  '".$isApproved."' , `content` =  '".$content."' , `associated_files_path` =  '".$associated_files_path."' , `priority` =  '".$priority."' , `created_at` =  '".$created_at."' , `paper_submitted_person` =  '".$paper_submitted_person."' , `amount` =  '".$amount."' , `status_of_manager` =  '".$status_of_manager."' , `status_of_principal` =  '".$status_of_principal."' , `status_of_secretary` =  '".$status_of_secretary."' , `last_modified_person` =  '".$last_modified_person."' , `updated_at` =  '".$updated_at."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `papers` WHERE id = '".$id_get."' ");
					}
					header("location:"."papers.php");
				}
				
				if($cat == "papertype" || $cat_get == "papertype"){
					$paper_type_id = mysqli_real_escape_string($link,$_POST["paper_type_id"]);
$paper_type_name = mysqli_real_escape_string($link,$_POST["paper_type_name"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `papertype` (  `paper_type_id` , `paper_type_name` ) VALUES ( '".$paper_type_id."' , '".$paper_type_name."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `papertype` SET  `paper_type_id` =  '".$paper_type_id."' , `paper_type_name` =  '".$paper_type_name."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `papertype` WHERE id = '".$id_get."' ");
					}
					header("location:"."papertype.php");
				}
				
				if($cat == "queries" || $cat_get == "queries"){
					$paper_id = mysqli_real_escape_string($link,$_POST["paper_id"]);
$query = mysqli_real_escape_string($link,$_POST["query"]);
$answer = mysqli_real_escape_string($link,$_POST["answer"]);
$created_at = mysqli_real_escape_string($link,$_POST["created_at"]);
$updated_at = mysqli_real_escape_string($link,$_POST["updated_at"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `queries` (  `paper_id` , `query` , `answer` , `created_at` , `updated_at` ) VALUES ( '".$paper_id."' , '".$query."' , '".$answer."' , '".$created_at."' , '".$updated_at."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `queries` SET  `paper_id` =  '".$paper_id."' , `query` =  '".$query."' , `answer` =  '".$answer."' , `created_at` =  '".$created_at."' , `updated_at` =  '".$updated_at."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `queries` WHERE id = '".$id_get."' ");
					}
					header("location:"."queries.php");
				}
				
				if($cat == "users" || $cat_get == "users"){
					$username = mysqli_real_escape_string($link,$_POST["username"]);
$password = mysqli_real_escape_string($link,$_POST["password"]);
$designation = mysqli_real_escape_string($link,$_POST["designation"]);
$remember_token = mysqli_real_escape_string($link,$_POST["remember_token"]);
$department = mysqli_real_escape_string($link,$_POST["department"]);
$last_login = mysqli_real_escape_string($link,$_POST["last_login"]);


				if($act == "add"){
					mysqli_query($link, "INSERT INTO `users` (  `username` , `password` , `designation` , `remember_token` , `department` , `last_login` ) VALUES ( '".$username."' , '".md5($password)."', '".$designation."' , '".$remember_token."' , '".$department."' , '".$last_login."' ) ");
				}elseif ($act == "edit"){
					mysqli_query($link, "UPDATE `users` SET  `username` =  '".$username."' , `designation` =  '".$designation."' , `remember_token` =  '".$remember_token."' , `department` =  '".$department."' , `last_login` =  '".$last_login."'  WHERE `id` = '".$id."' "); 	
					}elseif ($act_get == "delete"){
						mysqli_query($link, "DELETE FROM `users` WHERE id = '".$id_get."' ");
					}
					header("location:"."users.php");
				}
				?>