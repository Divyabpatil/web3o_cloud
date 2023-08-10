<?php

include('connection.php');
$course_id = $_POST['course_id'];
$question = $_POST['question'];
$name = $_POST['name'];
$email = $_POST['email'];

$insertQuery = "INSERT INTO questions (course_id, question, name, email) VALUES ('$course_id', '$question', '$name, ', '$email, ')";
mysqli_query($connection, $insertQuery);

// Redirect back to the item details page
header("Location: courses.php?id=$course_id");
?>
