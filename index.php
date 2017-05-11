<?php
require_once("part_files/connection.php");
if (isset($_POST['submit']))
{
  $email = $_POST['email'];
  $text = $_POST['message'];
  $query = "INSERT INTO mails(";
  $query .= "mail, text";
  $query .= ") VALUES (";
  $query .= "'{$email}', '{$text}')";
  $result = $connect->prepare($query);
  $result->execute();
}
$query1 = "SELECT * FROM categories ";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="index.css" title="style"/>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/animate/animate.css" />
<link rel="stylesheet" href="assets/animate/set.css" />
</head>
<title>Brand yourself with us !!! </title>
<body>
<syle>
<div>
 <nav  class="navbar navbar-default">
  <div class="container-fluid" <p>
  <div class="navbar-header">
  <ul class="nav navbar-nav">
  <li ><a href="index.php">Home</a></li>
  <!-- <li><a href="#">About Us</a></li> -->
  </ul>
</div>

 <ul class="nav navbar-nav navbar-right">
<input type="text" name="check" placeholder="  Search ..." class="">
<button>Search</button>
 </ul>
  </nav>

<div id="works"  class=" clearfix grid">
<?php foreach ($connect->query($query1) as $row) { ?>

    <figure class="effect-oscar  wowload fadeIn">
        <img src="images/portfolio/back<?= $row['id'];?>.jpg" alt="img01"/>
        <figcaption>
            <h2><?= $row['name'];?></h2>
            <p><?= $row['description'];?><br>
            <!-- <a href="images/portfolio/swim.jpg" title="1" data-gallery>View more</a></p> -->
        </figcaption>
    </figure>
    <?php } ?>

<footer class="footer-distributed">
<div class="footer-left">
<h3>Uz<span>Rate</span></h3>
<p style = "color: white">Press <a href = "regcom.php">here</a>to register your company. Administrator
  will look up your request and posts your company as soon as possible</p>
<p class="footer-links">
  <!-- <a href="#">Faq</a>
    ·
    <a href="#">About</a>
    ·
    <a href="#">Log In</a> -->
    ·
    <a href="regcom.php">Become our partner</a>
    </p>

<p class="footer-company-name">Uzrate &copy; 2017</p>
<div class="footer-icons">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-telegram"></i></a>
    <ul class="nav navbar-nav navbar-right">
</div>
</div>
    <div class="footer-right">
  <p>Contact Us</p>
  <form action= "<?= $_SERVER['PHP_SELF'];?>" method="post">
   <input type="text" name="email" placeholder="Email" />
    <textarea name="message" placeholder="Message"></textarea>
<button type = "submit" name = "submit">Submit</button>
</form>
    </div>
 </footer>
</body>
</html>
