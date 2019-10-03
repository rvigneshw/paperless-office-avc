<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-papers.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Papers</a>

				<h1>Papers</h1>
				<p>This table includes <?php echo counting("papers", "id");?> papers.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Paper type</th>
			<th>Department id</th>
			<th>Subject</th>
			<th>IsApproved</th>
			<th>Content</th>
			<th>Associated files path</th>
			<th>Priority</th>
			<th>Created at</th>
			<th>Paper submitted person</th>
			<th>Amount</th>
			<th>Status of manager</th>
			<th>Status of principal</th>
			<th>Status of secretary</th>
			<th>Last modified person</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$papers = getAll("papers");
				if($papers) foreach ($papers as $paperss):
					?>
					<tr>
		<td><?php echo $paperss['id']?></td>
		<td><?php echo $paperss['paper_type']?></td>
		<td><?php echo $paperss['department_id']?></td>
		<td><?php echo $paperss['subject']?></td>
		<td><?php echo $paperss['isApproved']?></td>
		<td><?php echo $paperss['content']?></td>
		<td><?php echo $paperss['associated_files_path']?></td>
		<td><?php echo $paperss['priority']?></td>
		<td><?php echo $paperss['created_at']?></td>
		<td><?php echo $paperss['paper_submitted_person']?></td>
		<td><?php echo $paperss['amount']?></td>
		<td><?php echo $paperss['status_of_manager']?></td>
		<td><?php echo $paperss['status_of_principal']?></td>
		<td><?php echo $paperss['status_of_secretary']?></td>
		<td><?php echo $paperss['last_modified_person']?></td>
		<td><?php echo $paperss['updated_at']?></td>


						<td><a href="edit-papers.php?act=edit&id=<?php echo $paperss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $paperss['id']?>&cat=papers" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				