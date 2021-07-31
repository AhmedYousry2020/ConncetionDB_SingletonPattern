<?php
class ConnectDBWithSingleton{

    private static $instance = null;
    private $connect;

    private $host = '127.0.0.1';
    private $user = 'root';
    private $pass = '';
    private $name = 'DB_Example';


    private function __construct(){

        try{
            $this->connect = new PDO("mysql:host=".$this->host.";
            dbname=".$this->name, $this->user, $this->pass); 

            echo "Connected successfully";
        
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
         
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self();
         }
         
         return self::$instance;
    }

    public function getConnection(){
        return $this->connect;
    }
    

}

$objectDB =  ConnectDBWithSingleton::getInstance();
$connection = $objectDB->getConnection();
var_dump($connection);

$objectDB1 =  ConnectDBWithSingleton::getInstance();
$connection1 = $objectDB1->getConnection();
var_dump($connection1);

?>