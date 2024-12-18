<?php 
class Connection{

  public $sName = "localhost";
  public $uName = "root";
  public $pass = "";
  public $db_name = "online_book_store_db";
  public $conn;

  public function __construct(){
    try {
      $this->conn = new PDO("mysql:host=$this->sName;dbname=$this->db_name", 
                      $this->uName, $this->pass);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo "Connection failed : ". $e->getMessage();
    }
  }

  public function getConn(){
    return $this->conn;
  }
}
?>