
<?php require_once("../part_files/connection.php");?>
<?php require_once("../part_files/functions.php");?>
<?php require_once("../part_files/session.php");?>

<?php if (isset($_SESSION['logged_in']))
{
	redirect_to("main.php");
}
if(isset($_POST['submit']))
{
  $user = $_POST['username'];
  $pass = $_POST['pass'];
  $query =  "SELECT * FROM  admins ";
  $query .= "WHERE username = 'admin'";
  $result = $connect->prepare($query);
  $result->execute();
  $admin_set = $result->fetch();
  if( $_POST['username'] == $admin_set['username'])
  {
    $salt =  $admin_set['salt'];
    $hashed_pass = hashing($pass, $salt);
    if ($hashed_pass == $admin_set['hashed_pass'])
    {
      $_SESSION['logged_in'] = $admin_set['username'];
    redirect_to("main.php");
    }
    else {
    $_SESSION['message'] = "Wrong password";
    }
  }
  else $_SESSION['message'] = "Wrong username";
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>login page</title>



      <link rel="stylesheet" href="loginpage.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>



</head>

<body>
<?php
//$query = "SELECT * FROM admins";

?>
<form action = "<?= $_SERVER['PHP_SELF'];?>" method = "post">
  <header>Login</header>

  <label for="field">Login<span>*</span></label>
   <?php
  // echo  hashing("password", "longlonglonglonglongsalt");
  // echo "<br><br>";
  echo message();
    ?>
  <input type = "text" name = "username">
  <div class="help">At least 6 character</div>
  <label>Password <span>*</span></label>
  <input type = "password" name = "pass">
  <div class="help">Use upper and lowercase lettes as well</div>
  <input type = "submit" name = "submit">

</form>
</body>
</html>
