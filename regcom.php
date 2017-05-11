<?php require_once("part_files/connection.php");?>
<?php require_once("part_files/functions.php");?>
<?php require_once("part_files/session.php");?>
<?php
$query1 = "SELECT id, name FROM categories";

if (isset($_POST['submit']))
{
  $cat_id = $_POST['category'];
  $fullname = $_POST['fullname'];
  $org_name = $_POST['org_name'];
  $email =  $_POST['mail'];
  $adress = $_POST['adress'];
  $number = $_POST['number'];
  $user = $_POST['username'];
  $pass = $_POST['pass'];
  $notes = $_POST['notes'];
  $site = $_POST['website'];
  $file_path = "/images/";
  $file_name = $user;
  $date = date("Y-M-d");
  upload_to_server("photo", $file_path, $file_name);
  $query = "INSERT INTO organizations(";
  $query .= "fullname, org_name, org_mail, ";
  $query .= "org_adress, org_number, photo_name, ";
  $query .= "notes, upload_date, cat_id, website";
  $query .= ") VALUES (";
  $query .= "'{$fullname}', '{$org_name}', ";
  $query .= "'{$email}', '{$adress}', '{$number}', ";
  $query .= "'{$file_name}', '{$notes}', '{$date}', ";
  $query .= "'{$cat_id}', '{$site}')";
  $result = $connect->prepare($query);
  $result->execute();
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <link rel="stylesheet" type="text/css" href="regcom.css">
	<title>Company registering</title>
</head>

<body>
<h4>Company registering</h4>
<div >
<form method="post" action = "<?= $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<input type="text" name="fullname" placeholder="   your name">
<input type="text" name="org_name" placeholder="   your organisation name">
<input type="text" name="website" placeholder="   your website">
<input type="text" name="mail" placeholder="   your mail">
<input type="text" name="adress" placeholder="  company adress">
<input type="text" name="number" placeholder="  contact number">
<input type="text" name="username" placeholder="  username">
<input type="text" name="pass" placeholder="  choose password">
<input type="text" name="conf_pass" placeholder="  rewrite password">
<select name = "category">Choose
  <?php foreach($connect->query($query1) as $row) { ?>}
<option value="<?= $row['id'];?>"><?= $row['name'];?></option>
<?php } ?>
  </select>
  <textarea name = "notes" > </textarea>

<input type="file" name = "photo" id="myFile">

<input type = "submit" name = "submit" value = "register">
</form>
</div>
</body>
</html>
