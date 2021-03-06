<!DOCTYPE html>

<head>
    <title>Edit User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/EIE4432-Group-Project/js/function.js"></script>
    <script src="/EIE4432-Group-Project/js/cookie.js"></script>

    <script>
        function showID() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "getSQL.php", true);
            xmlhttp.send();
            xmlhttp.onload = function() {
                document.getElementById("idDisplay").innerHTML = this.responseText;
            }
        }
    </script>

</head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Online examination system</h1>
        <p id="welcomMsg">Welcome! </p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Online examination system</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/EIE4432-Group-Project/html/login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/EIE4432-Group-Project/html/registration.html">Registration</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top:30px">
        <?php
        $editID = htmlspecialchars($_COOKIE["editID"]);

        include "mysql-connect.php";
        $connect = mysqli_connect($server, $user, $pw, $db);

        if (!$connect) {
            die('Could not connect: ' . mysqli_error($connect));
        }

        $sql = strval("SELECT * FROM `user` WHERE id = $editID");
        $result = mysqli_query($connect, $sql);

        //Create dropdown list
        $row = mysqli_fetch_array($result);

        //Get selected inputted values from the HTML page
        $ID = $_POST['UserID'];
        $pw = $_POST['pwd'];
        $nickName = $_POST['nickName'];
        $email = $_POST['email'];
        $role = $_POST['Select_S_T'];

        //Select inputted values to INSERT record by using SQL
        if ($role == "Teacher") {
            $course = $_POST['course'];

            $sql = "UPDATE user SET `id` = $ID , `name` = '$nickName', `email` = '$email', `password` = '$pw', `role` = '$role', `course` =  '$course', `gender` = '', `birthday` = '' WHERE id = $editID";
        } else if ($role == "Student") {
            $birthday = $_POST['birthday'];
            $gender = $_POST['gender'];

            $sql = "UPDATE user SET `id` = $ID , `name` = '$nickName', `email` = '$email', `password` = '$pw' , `role` = '$role', `gender` = '$gender', `birthday` = '$birthday', `course` =  '' WHERE id = $editID";
        }

        $sql2 = "UPDATE `image` SET `id` = $ID WHERE id = $editID";

        if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql2)) {
            echo "<h3>A new user record is updated successfully!</h3><br>";
            header('Location: /EIE4432-Group-Project/php/systemManagement.php');
        } else {
            $err = "Error: " . $sql . "<br>" . mysqli_error($connect);
            if (strpos($err, "Duplicate") == true) {
                echo "<h3>User ID or email is used already. \nPlease use another email.</h3><br>";
                echo "<div class='text-center'><button type='button' class='btn btn-dark mt-3' onclick='enableEdit()'>Back</button></div>";
            } else {
                echo $err;
                echo "<div class='text-center'><button type='button' class='btn btn-dark mt-3' onclick='enableEdit()'>Back</button></div>";
            }
        }

        mysqli_close($connect);

        ?>
    </div>
    <div class="jumbotron text-center">
    </div>

</body>

</html>