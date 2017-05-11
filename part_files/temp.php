<?php $hostname = "localhost";
$username = "root";
$db_name = "uzrate";
$usr_pass = "";
$connect  = new mysqli($hostname, $username, $usr_pass, $db_name);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
//echo "Connected successfully";
$query = "SELECT o.id, o.org_name, o.cat_id, o.upload_date, ";
$query .= "  c.name  FROM  organizations o ";
$query .= "JOIN  categories c ON c.id = o.cat_id ";
$query.= "WHERE o.allow_state = 0 ";
$result = $connect->query($query);
$row = $result->fetch_assoc();
print_r($row);
?>
