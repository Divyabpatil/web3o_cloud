<?php

include('../connection.php');
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$dateTime = date('dmYHmi');
$query = "UPDATE courses SET name='$name', description='$description'";
if ($_FILES['image']['name']) {
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageNamefilename = $dateTime.$imageName;
    move_uploaded_file($imageTmp, 'upload_folder/' . $imageNamefilename);

    $query = $query . ", image='$imageNamefilename'";
}

if ($_FILES['video']['name']) {
    $videoName = $_FILES['video']['name'];
    $videoTmp = $_FILES['video']['tmp_name'];
    $videoNamefilename = $dateTime.$videoName;
    move_uploaded_file($videoTmp, 'upload_folder/' . $videoNamefilename);
    $query = $query . ", video='$videoNamefilename'";
}
if ($_FILES['video_transcript']['name']) {
    $video_transcriptName = $_FILES['video_transcript']['name'];
    $video_transcriptTmp = $_FILES['video_transcript']['tmp_name'];
    $video_transcriptNamefilename = $dateTime.$video_transcriptName;
    move_uploaded_file($video_transcriptTmp, 'upload_folder/' . $video_transcriptNamefilename);
    $query = $query . ", video_transcript='$video_transcriptNamefilename'";
}

$query =  $query . " WHERE id=$id";
// echo "<pre>";print_r( $query);die();
mysqli_query($connection, $query);

header("Location: index.php");
?>