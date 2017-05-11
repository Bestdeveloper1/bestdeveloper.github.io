<?php
class Server
{
public function __construct()
{

}
public function getStudentName($id_array)
{
  return 'Sam';
}
}
$params = array("uri" => "http://uzrate/admin/soap/server.php");
$server = new SoapServer(NULL, $params);
$server->setClass('Server');
$server->handle();


?>
