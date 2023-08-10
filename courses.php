<!DOCTYPE html>
<html>

<head>
    <title>web3o_cloud</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">web3o_cloud</a>
    </nav>
    <div class="container mt-4">
        <?php
        include('connection.php');

        $course_id = $_GET['id'];
        $itemQuery = "SELECT * FROM courses WHERE id = $course_id";
        $itemResult = mysqli_query($connection, $itemQuery);
        $itemRow = mysqli_fetch_assoc($itemResult);

        // Fetch questions and answers
        $questionsQuery = "SELECT * FROM questions WHERE course_id = $course_id order by id desc";
        $questionsResult = mysqli_query($connection, $questionsQuery);
        ?>

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="admin/upload_folder/<?php echo $itemRow['image']; ?>" class="card-img-top"
                        alt="Item Image">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $itemRow['name']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $itemRow['description']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" >
                <div class="embed-responsive embed-responsive-16by9">
                    <video crossorigin autobuffer controls muted poster="admin/upload_folder/<?php echo $itemRow['image']; ?>"  class="embed-responsive-item">
                        <source id="mp4" src="admin/upload_folder/<?php echo $itemRow['video']; ?>" type="video/mp4">
                        <track label="English" kind="subtitles" srclang="en" src="admin/upload_folder/<?php echo $itemRow['video_transcript']; ?>" default>
                    </video>
                </div>
            </div>
            <div class="col-md-3">
                <h3>Ask a Question</h3>

                <!-- Add a form to submit questions -->
                <form action="add_question.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="question">Your Question:</label>
                        <textarea class="form-control" id="question" name="question" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Question</button>
                </form>

                <!-- Display existing questions and answers -->
                <?php
                while ($questionRow = mysqli_fetch_assoc($questionsResult)) {
                    echo "<div class='card mt-3'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Question</h5>";
                    echo "<p class='card-text'>{$questionRow['question']}</p>";
                    echo "<h5 class='card-title mt-3'>Answer</h5>";
                    echo "<p class='card-text'>{$questionRow['answer']}</p>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

</body>

</html>