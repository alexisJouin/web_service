<?php

class Server {

    private $con;

    public function __construct() {
        $this->con = (is_null($this->con)) ? self::connect() : $this->con;
    }

    public function getBookName($id) {
        $rep = $this->con->prepare('SELECT nom FROM book WHERE id = ?');
        $rep->execute(array($id['id']));
        $result = $rep->fetch();
        $rep->closeCursor();
        return $result['nom'];
    }

    /**
     * Connexion avec la base de données avec PDO
     */
    public function connect() {
        require_once 'infoBDD.php';
        try {
            $attrs = array(PDO::ATTR_PERSISTENT => true);
            $this->con = new PDO('mysql:host=localhost;dbname=tp_web_service', $user, $pass, $attrs);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->con->exec("set names utf8");
            return $this->con;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}

$parameters = array('uri' => 'localhost/Web%20Service/tp1_soap/Server.php');
$server = new SoapServer(NULL, $parameters);
$server->setClass("Server");
$server->handle();
