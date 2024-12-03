<?php

class Database
{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "themoon";
  private $conn;
  private $stmt;

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  function query($sql, $param = [])
  {
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->execute($param);
    return $this->stmt;
  }
  function getAll($sql, $param = [])
  {
    $stmt = $this->query($sql, $param);
    //$result= $stmt->setFetchmode(PDO::FETCH_ASSOC);
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  function getOne($sql, $param = [])
  {
    $stmt = $this->query($sql, $param);
    //$result= $stmt->setFetchmode(PDO::FETCH_ASSOC);
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  function insert($sql, $param = [])
  {
    $this->query($sql, $param);
    return $this->conn->lastInsertId();
  }
  function delete($sql, $param = [])
  {
    $this->query($sql, $param);
  }
  function update($sql, $param = [])
  {
    $this->query($sql, $param);
  }
  public function beginTransaction()
  {
    $this->conn->beginTransaction();
  }

  public function commit()
  {
    $this->conn->commit();
  }

  public function rollBack()
  {
    $this->conn->rollBack();
  }
  function __destruct()
  {
    unset($this->conn);
  }
}
