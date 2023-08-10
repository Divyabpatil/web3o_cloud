<!DOCTYPE html>
<html>

<head>
	<title>Web3o_cloud Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">Web3o_cloud Admin</a>
	</nav>
	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
					<a href="index.php"
						class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
						<span class="fs-5 d-none d-sm-inline">Course</span>
					</a>
						
				</div>
			</div>
			<div class="col py-3">

				<div class="row">
					<div class="col-md-12">
						<a class="btn btn-success" href="add.php">Add New Course</a>
					</div>
				</div>
				<br>
				<div class="row">

					<div class="col-md-12">
						<table border="1" class="table">
							<tr>
								<th>Course Name</th>
								<th>Course Description</th>
								<th>Image</th>
								<th>Video</th>
								<th>Action</th>
								<th>Question/Answer</th>
								<?php
								include('../connection.php');
								$query = "SELECT * FROM courses";
								$result = mysqli_query($connection, $query);

								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>{$row['name']}</td>";
									echo "<td>{$row['description']}</td>";
									echo "<td><img src='upload_folder/{$row['image']}' width='100'></td>";
									echo "<td><video width='150' controls><source src='upload_folder/{$row['video']}' type='video/mp4'></video></td>";
									echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Delete</a></td>";
									echo "<td><a href='course_details.php?id={$row['id']}' class='btn btn-primary mt-2'>View Details</a></td>";
									echo "</tr>";
								}
								?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>