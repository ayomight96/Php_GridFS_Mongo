<?php

class DBConnection
{
    const HOST   = 'localhost';
    const PORT   = 27017;
    const DBNAME = 'misarchivos';
    
    private static $instance;
    
    public $connection;    
    public $database;
    
    private function __construct()
    {
       
            require 'vendor/autoload.php'; // incluir lo bueno de Composer  
       $cliente = new MongoDB\Client("mongodb://localhost:27017");
$this->database = $cliente->misarchivos->documentos; 
        echo"gg";
        
    }
    
    static public function instantiate()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        
        return self::$instance;
    }
    
    public function getCollection($name)
    {
        return $this->database->selectCollection($name);
    }
}