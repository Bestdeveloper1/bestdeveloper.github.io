<?php
require_once("../part_files/connection.php");
$query = "SELECT * FROM mails ";
$query .= "ORDER BY id DESC";
?>
<?php if (!isset($_SESSION['logged_in']))
{
	redirect_to("index.php");
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
<link rel="stylesheet" type="text/css" href="adminpage.css">
<head>
	<title>Admin Page</title>
</head>
<body>
<h4> Admin Page</h4>
<div>
<table>
  <tr>
    <th>Mails</th>
    <th>Messages</th>
  </tr>
<?php  foreach ($connect->query($query) as $row) { ?>

  <tr>
  <td><?= $row['mail'];?></td>
  <td><?= $row['text'];?></td>
</tr>
  <?php }?>

</table>
<footer>
