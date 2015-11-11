<?php

class Database
{
  private $host      = 'localhost';
  private $user      = 'root';
  private $pass      = '';
  private $dbname    = 'openbloc2015';

  private $dbh;

  private $stmt;

  public function __construct()
  {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';

    $options = array(PDO::ATTR_PERSISTENT       => true,
    PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION);

    try
    {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      $this->dbh->exec("SET CHARACTER SET utf8");
    }
    catch (PDOException $e)
    {
      $_SESSION['error'] = $e->getMessage();
      trigger_error("Connexion impossible avec la base de données");
    }
  }

  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($param, $value, $type = null)
  {
    if (is_null($type))
    {
      switch (true)
      {
        case is_int($value):
        $type = PDO::PARAM_INT;
        break;

        case is_bool($value):
        $type = PDO::PARAM_BOOL;
        break;

        case is_null($value):
        $type = PDO::PARAM_NULL;
        break;

        default:
        $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    return $this->stmt->execute();
  }

  public function resultset()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }

  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }

  public function beginTransaction()
  {
    return $this->dbh->beginTransaction();
  }

  public function endTransaction()
  {
    return $this->dbh->commit();
  }

  public function cancelTransaction()
  {
    return $this->dbh->rollBack();
  }

  public function debugDumpParams()
  {
    return $this->stmt->debugDumpParams();
  }
}

?>
