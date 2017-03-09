<?php

//try {
//    $url = "http://localhost/Web%20Service/tp1_soap/Service.php";
//    $client = new SoapClient(NULL, array('uri' => $url, 'location' => $url, 'trace' => 1, 'exception' => 0));
//} catch (Exception $ex) {
//    echo $ex;
//}

class Client {

    private $service;

    public function __construct() {
        try {
            $url = "http://localhost/Web%20Service/tp1_soap/Service.php";
            $this->service = new SoapClient(NULL, array('uri' => $url, 'location' => $url, 'trace' => 1, 'exception' => 0));
        } catch (Exception $ex) {
            print_r($ex);
        }
    }

    public function getBookName($id) {
        try {
            $this->service->__soapCall('getBookName', $id);
        } catch (Exception $ex) {
            print_r($ex);
        }
    }

}

$client = new Client;
