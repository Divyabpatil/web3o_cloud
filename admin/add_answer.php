<?php
include('../connection.php');
$questionId = $_POST['question_id'];
$course_id = $_POST['course_id'];
$answer  = $_POST['answer'];

$updateQuery = "UPDATE questions SET answer = '$answer' WHERE id = $questionId";
mysqli_query($connection, $updateQuery);

// Redirect back to the item details page
header("Location: course_details.php?id=$course_id");
?>
