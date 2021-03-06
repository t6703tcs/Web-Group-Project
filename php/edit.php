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

<body onload="showID();">

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

    <!-- Modify alert box -->
    <div class="container" style="margin-top:30px">
        <div class="alert alert-dark" id="modifyBox">
            <strong>Modify:</strong>
            <div class="alert alert-danger alert-dismissible fade show" id="warningBox" hidden>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> Please input all required information.
            </div>

            <div class="alert alert-info alert-dismissible fade show" id="roleBox" hidden>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> Please select your role. (Student/ Teacher)
            </div>

            <div class="alert alert-warning alert-dismissible fade show" id="inputBox" hidden>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> The format of information is wrong. <br>User ID should be digits and Email address should contain "@"
            </div>

            <div class="row h-100 justify-content-center align-items-center">
                <form class="col-12" method="post" action="/EIE4432-Group-Project/php/update.php" id="form_content" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="text">Student/ Teacher:</label>
                        <select class="form-control" id="Select_S_T" name="Select_S_T" onchange="checkRoles()">
                            <option value="" selected disabled>Select Student/ Teacher</option>
                            <option>Student</option>
                            <option>Teacher</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">User ID:</label>
                        <input type="text" class="form-control" placeholder="Enter User ID" id="UserID" name="UserID">
                    </div>
                    <div class="form-group">
                        <label for="text">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter Password" id="pwd" name="pwd">
                    </div>
                    <div class="form-group">
                        <label for="text">Nick Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Nick Name" id="nickName" name="nickName">
                    </div>
                    <div class="form-group" id="gender_hide_show">
                        <label for="text">Gender:</label>
                        <select class="form-control" id="gender" name="gender" disabled>
                            <option value="" selected disabled></option>
                            <option>M</option>
                            <option>F</option>
                        </select>
                    </div>
                    <div class="form-group" id="course_hide_show">
                        <label for="text">Course:</label>
                        <select class="form-control" id="course" name="course" disabled>
                            <option value="" selected disabled></option>
                            <option>EIE3333_20201_A: Data and Computer Communications</option>
                            <option>EIE4435_20201_A: Image and Audio Processing</option>
                            <option>EIE3109_20201_A: Mobile Systems and Application Development</option>
                            <option>EIE3320_20201_A: Object-oriented Design and Programming</option>
                            <option>EIE4432_20201_A: Web Systems and Technologies</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">Email address:</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group" id="birthday_hide_show">
                        <label for="text">Birthday:</label>
                        <input type="date" class="form-control" placeholder="Enter birthday" id="birthday" name="birthday" disabled>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-dark mt-3" onclick="checkInfo()" id="btnSubmit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center">
    </div>

</body>

</html>