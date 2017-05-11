<?php
function logged_in()
{
	return isset($_SESSION["logged_in"]);
}
function confirm_login()
{
	if(!logged_in())
	{
redirect_to("../admin/index.php");	}
}

function hashing($password, $salt)
{
$hash_format = "$2y$10$";

$format_and_salt = $hash_format.$salt;
$hash = crypt($password, $format_and_salt);
return $hash;
}
function upload_to_server($name_in_html, $drct_folder, $name_to_be_given)
{
	$extension = strrchr($_FILES["{$name_in_html}"]["name"], '.');
	$file = dirname(__FILE__)."/{$drct_folder}/".$name_to_be_given.$extension;
	move_uploaded_file($_FILES["{$name_in_html}"]["tmp_name"], $file);
	return $extension;
}
function redirect_to($new_location)
{
	header("Location: " . $new_location);
	exit;
}

 ?>
