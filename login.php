
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="login.php">Online Attendance</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="view_all.php">View Attendance</a></li>
        <li><a href="#about">About</a></li>

      </ul>
    </div>
  </div>
</nav>

    <div class="login-box">
      <div class="row">
        <div class="col-md-6 login-left">
          <h2>login here</h2>
          <form action="validation.php" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="txt" name="user" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>

        <div class="col-md-6 login-right">
          <h2>Register here</h2>
          <form action="registration.php" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="txt" name="user" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
  </div>

</body>

</html>
