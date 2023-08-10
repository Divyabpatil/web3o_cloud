<!DOCTYPE html>
<html lang="en">

<head>
    <title>web3o_cloud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">web3o_cloud</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<h2><b>Our Course</b></h2>
            </div>
        </div><br ><br>
        <div class="row">

            <?php
            include('connection.php');
            $query = "SELECT * FROM courses";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-6">
                    <div class="card">
                        <img src="admin/upload_folder/<?php echo $row['image']; ?>" style="width : 100% !important; height:200px !important;"
                            class="card-img-top" alt="Item Image">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row['name']; ?>
                            </h5>
                            
                        </div>
                        <a href="courses.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Start Cource</a>
                    </div><br><br>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>