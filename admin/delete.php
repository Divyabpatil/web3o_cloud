<?php
include('../connection.php');
$id = $_GET['id'];
$query = "DELETE FROM courses WHERE id = $id";
mysqli_query($connection, $query);

header("Location: index.php");
?>
