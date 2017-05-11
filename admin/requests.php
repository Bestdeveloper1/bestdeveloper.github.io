<?php require_once("../part_files/connection.php");?>
<?php require_once("../part_files/functions.php");?>
<?php require_once("../part_files/session.php");?>
<?php if (!isset($_SESSION['logged_in']))
{
	redirect_to("index.php");
}
?>
<?php
//$query = "SELECT * FROM organizations ";
$query  = "SELECT o.id, o.org_name, o.cat_id, o.upload_date, ";
$query .= "  c.name  FROM  organizations o ";
$query .= "JOIN  categories c ON c.id = o.cat_id ";
$query .= "WHERE o.allow_state = 0 ";
$query .= "ORDER BY id DESC";

?>
<ul><?php
foreach ($connect->query($query) as $row)
{?>
  <li>
    <a href="request.php?org_id=<?=$row['id'];?>"> <?= $row['name']. "    ". $row['org_name'];?> </a>
  </li>
<?php } ?>

</ul>
