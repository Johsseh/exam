<?php
session_start();
if(!$_SESSION['id']){
    header("../adlog.php");
}
include '../connection.php';
$session_id= $_SESSION['id'];
$query=mysqli_query($conn,"SELECT * FROM staff WHERE id='$session_id' AND type='admin'");
$rw=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../ico/favicon.ico">

    <title>Admin Dashboard | EMS</title>

    <!-- Bootstrap core CSS -->
    <!-- core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">>
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
include_once ('../codes/header.php');
?>
<section>
    <div class="container">
    <div class="row">
        <?php
        include_once ('../codes/sidebar.php');
        ?>
        <div class="col-sm-9">
            <b><h2>Add students to the system</h2></b>
            <form action="../codes/query.php" method="post" class="form-horizontal">
                <div  class="row form-group">

                    <label for="fame" class="col-sm-2 control-label">Firstname</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required>
                    </div>

                    <label for="lame" class="col-sm-2 control-label">Lastname</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required>
                    </div>

                </div>


                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Registration NO</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="regno" placeholder="Assign Registration NO" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="Telephone" class="col-sm-2 control-label">Telephone</label>
                    <div class="col-md-10">
                        <input type="tel" class="form-control" name="telephone" placeholder="Enter Phone No." required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="home" class="col-sm-2 control-label">Course</label>
                    <div class="col-md-10">
                        <?php
                        include_once('../connection.php');
                        $query = "select * from course";
                        $result = mysqli_query($conn,$query) or die (mysqli_error($conn));
                        echo '<select name="course">';
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<option value='" . $row['course'] ."'>" . $row['course'] ."</option>";
                        }
                        echo '</select>';

                        ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>

                <input type="hidden" name="studsubmit" value="2">
                <input type="submit" value="Add Student!">
                <a href="index.php">Back to Admin Dashboard</a>
            </form>

        </div>
    </div> <!--close row-->
</div><!---close container -->
</section>

        <?php
        include_once ('../codes/footer.php');
        ?>

</body>
</html>

