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
						<?php
						include('../connection.php');
				
						$course_id = $_GET['id'];
						$itemQuery = "SELECT * FROM courses WHERE id = $course_id";
						$itemResult = mysqli_query($connection, $itemQuery);
						$itemRow = mysqli_fetch_assoc($itemResult);
				
						// Fetch questions and answers
						$questionsQuery = "SELECT * FROM questions WHERE course_id = $course_id order by id desc";
						$questionsResult = mysqli_query($connection, $questionsQuery);
						?>
				
						<div class="card">
							<img src="upload_folder/<?php echo $itemRow['image']; ?>" style="width : 250px; height:250;"
								class="card-img-top" alt="Item Image">
							<div class="card-body">
								<h5 class="card-title">
									<?php echo $itemRow['name']; ?>
								</h5>
								<p class="card-text">
									<?php echo $itemRow['description']; ?>
								</p>
							</div>
						</div>
				
						<div class="mt-4">
							<h3>Questions and Answers</h3>
							<?php
							while ($questionRow = mysqli_fetch_assoc($questionsResult)) {
								echo "<div class='card mt-3'>";
								echo "<div class='card-body'>";
								echo "<h5 class='card-title'>Question</h5>";
								echo "<p class='card-text'>{$questionRow['question']}</p>";
								echo "<h5 class='card-title mt-3'>Answer</h5>";
				
								if (!empty($questionRow['answer'])) {
									echo "<p class='card-text'>{$questionRow['answer']}</p>";
								} else {
									echo "<form action='add_answer.php' method='post'>";
									echo "<input type='hidden' name='question_id' value='{$questionRow['id']}'>";
									echo "<input type='hidden' name='course_id' value='{$course_id}'>";
									echo "<div class='form-group'>";
									echo "<textarea class='form-control' name='answer' placeholder='Enter your answer' required></textarea>";
									echo "</div>";
									echo "<button type='submit' class='btn btn-primary'>Submit Answer</button>";
									echo "</form>";
								}
				
								echo "</div>";
								echo "</div>";
							}
							?>
				
						</div>
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