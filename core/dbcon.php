<?php
require_once('config.php');

Class Connection{
    private $DB_SERVER = "mysql:host=".DB_HOST.";dbname=".DB_NAME."";
    private $DB_USERNAME = DB_USERNAME;
    private $DB_PASSWORD = DB_PASSWORD;
    private $DB_OPTIONS  = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    protected $conn;

    public function open(){
        try{
            $this->db = new PDO($this->DB_SERVER, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_OPTIONS);
            return $this->db;
        }
        catch (PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    public function close(){
        $this->db = null;
    }
}

function encodedata($sData){
    $id=(double)$sData*525325.24;
    return base64_encode($id);
}

function decodedata($sData){
    $url_id=base64_decode($sData);
    $id=(double)$url_id/525325.24;
    return $id;
}

session_start();

?>