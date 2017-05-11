<?php require_once("../part_files/connection.php");?>
<?php require_once("../part_files/functions.php");?>
<?php require_once("../part_files/session.php");?>
<?php if (!isset($_SESSION['logged_in']))
{
	redirect_to("index.php");
}
if (isset($_POST['a']))
{echo "accepted";}
if (isset($_POST['d']))
{echo "denied";}
?>
<?php
 $org_id = $_GET['org_id'];
 $query  = "SELECT o.*, c.name  FROM  organizations o ";
 $query .= "JOIN  categories c ON c.id = o.cat_id ";
 $query .= "WHERE o.id = {$org_id} ";
$result = $connect->prepare($query);
$result->execute();
$row = $result->fetch();
echo $row['fullname'];

?>

<form action = "<?= $_SERVER['PHP_SELF'].'?org_id='.$org_id;?>" method = "post">
<input type= "submit" name = "a"> Accept
<input type= "submit" name = "d">Deny
</form>
