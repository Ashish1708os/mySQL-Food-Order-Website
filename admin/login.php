<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Food Order System</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <div class="login text-center">
    <h1>Login</h1>
    <br>
    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }

    if (isset($_SESSION['no-login-msg'])) {
      echo $_SESSION['no-login-msg'];
      unset($_SESSION['no-login-msg']);
    }
    ?>
    <br>
    <form action="" method="POST">
      <input type="text" id="username" name="username" placeholder="Enter Username">
      <br><br>
      <input type="password" id="password" name="password" placeholder="Enter Password">
      <br><br>
      <input type="submit" value="login" name="submit" style="width: 95%; padding:3%" class="btn btn-primary login-submit">
    </form>
    <br>
    <hr>
    <br>
    <p>
      Developed By - <a href="#" class="login-user-link">Ashish Salve</a> | <a href="#" class="login-user-link">Abhishek Aringire</a> | <a href="#" class="login-user-link">Shantanu Kulkarni</a>
    </p>
  </div>
</body>

</html>

<?php
// check weathe submit button clicked or not
if (isset($_POST['submit'])) {
  // get the data from login form
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // check sql database weather the user with same username and password exits or not
  $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

  // execute the query
  $res = mysqli_query($conn, $sql);

  // count rows to check weather the user exits or not
  $count = mysqli_num_rows($res);

  if ($count == 1) {
    // user available and login success
    $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
    $_SESSION['user'] = $username; // to check the user logged in or not and logout will unset it
    // redirect to admin dashboard
    header("location:" . SITEURL . "admin/index.php");
  } else {
    // user not available and login failed
    $_SESSION['login'] = "<div class='error'>Login failed.</div>";
    // redirect to login page
    header("location:" . SITEURL . "admin/login.php");
  }
}
?>