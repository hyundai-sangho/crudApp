<?php

class Database
{
  private $serverName = "localhost";
  private $userName = "root";
  private $password = "";
  private $dbName = "tutorial";
  private $pdo;

  public function __construct()
  {
    try {
      $dsn = "mysql:host=$this->serverName;dbname=$this->dbName";
      $this->pdo = new PDO($dsn, $this->userName, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function getData()
  {
    try {
      $sql = $this->pdo->query("SELECT * FROM crud");
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      return $sql->fetchAll();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function getOneData($id)
  {
    try {
      $sql = $this->pdo->prepare("SELECT * FROM crud WHERE id=:id");
      $sql->bindParam(":id", $id);
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      return $sql->fetch();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function insertData($name, $email, $gender)
  {
    try {
      $sql = $this->pdo->prepare("INSERT INTO crud (name, email, gender) VALUES (:name, :email, :gender)");
      $sql->bindParam(":name", $name);
      $sql->bindParam(":email", $email);
      $sql->bindParam(":gender", $gender);
      $sql->execute();

      // insert 실행 후에 header Location을 안 해주면 화면 새로고침시 기존에 남아있던 insert 실행문이 계속 반복되어 실행된다.
      // 결과적으로 같은 데이터를 새로고침 하는 횟수만큼 계속 들어가게 돼서 데이터가 엉망이 되버림
      header("Location: index.php?msg=데이터 입력 성공");
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function editData($name, $email, $gender, $id)
  {
    try {
      $sql = $this->pdo->prepare("UPDATE crud SET name=:name, email=:email, gender=:gender WHERE id=:id");
      $sql->bindParam(":id", $id);
      $sql->bindParam(":name", $_POST["name"]);
      $sql->bindParam(":email", $_POST["email"]);
      $sql->bindParam(":gender", $_POST["gender"]);
      $sql->execute();

      header("Location: index.php?msg=데이터 업데이트 완료");
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function deleteData($id)
  {
    try {
      $sql = $this->pdo->prepare("DELETE FROM crud WHERE id=:id");
      $sql->bindParam(":id", $id);
      $sql->execute();

      header("Location: index.php?msg=데이터 삭제 완료");
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
