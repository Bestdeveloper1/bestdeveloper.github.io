<?php
class Client
{

  public function __construct()
  {
    $params = array('location' => 'http://uzrate/admin/soap/server.php', 'uri' => 'uzrate/admin/soap/server.php', 'trace' => 1);
 $this->instance = new SoapClient(NULL, $params);


}
public function getName($id_array)
{
  return $this->instance->__soapCall('getStudentName', $id_array);
}
}
  //$client = new Client;

?>
