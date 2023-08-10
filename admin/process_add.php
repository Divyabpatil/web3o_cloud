<?php

include('../connection.php');
$name = $_POST['name'];
$description = $_POST['description'];

$imageName = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name'];
$imageNamefilename = $dateTime.$imageName;
move_uploaded_file($imageTmp, 'upload_folder/' . $imageNamefilename);

$videoName = $_FILES['video']['name'];
$videoTmp = $_FILES['video']['tmp_name'];
$videoNamefilename = $dateTime.$videoName;
move_uploaded_file($videoTmp, 'upload_folder/' . $videoNamefilename);


$video_transcriptName = $_FILES['video_transcript']['name'];
$video_transcriptTmp = $_FILES['video_transcript']['tmp_name'];
$video_transcriptNamefilename = $dateTime.$video_transcriptName;
move_uploaded_file($video_transcriptTmp, 'upload_folder/' . $video_transcriptNamefilename);
$query = $query . ", video_transcript='$video_transcriptNamefilename'";

$query = "INSERT INTO courses (name, description, image, video, video_transcript) VALUES ('$name', '$description', '$imageNamefilename', '$videoNamefilename', '$video_transcriptNamefilename')";
mysqli_query($connection, $query);

header("Location: index.php");
?>
