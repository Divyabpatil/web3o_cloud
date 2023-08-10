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

					<div class="col-md-6">
						<h2>Add New Course</h2>
						<form action="process_add.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Course Name:</label>
								<input type="text" class="form-control" id="name" name="name" required>
							</div>
							<div class="form-group">
								<label for="description">Course Description:</label>
								<textarea type="text" class="form-control" id="description" name="description"
									required></textarea>
							</div>
							<div class="form-group">
								<label for="image">Image:</label>
								<input type="file" class="form-control-file" id="image" name="image" accept="image/*"
									required>
							</div>
							<div class="form-group">
								<label for="video">Video:</label>
								<input type="file" class="form-control-file" id="video" name="video" accept="video/*"
									required>
							</div>
							<div class="form-group"> 
								<label for="video">Video Transcript:</label>
								<input type="file" class="form-control-file" id="video_transcript" name="video_transcript" accept="vtt/*" required>
							</div>
							<button type="submit" class="btn btn-primary">Add Item</button>
						</form>
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