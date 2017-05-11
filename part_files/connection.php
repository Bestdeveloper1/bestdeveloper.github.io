<?php
$hostname = "localhost";
$username = "root";
$db_name = "uzrate";
$usr_pass = "";
// $connect  = new mysqli($hostname, $username, $usr_pass, $db_name);
//
// // Check connection
// if ($connect->connect_error) {
//     die("Connection failed: " . $connect->connect_error);
// }
// //echo "Connected successfully";
try {
    $connect = new PDO("mysql:host={$hostname};dbname={$db_name}", $username, $usr_pass);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
