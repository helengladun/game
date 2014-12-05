<?php
class PeopleTest extends PHPUnit_Extensions_Database_TestCase
{
  public function __construct()
  {
      $this->connection = new PDO('sqlite::memory:');
      $this->connection->query("
         CREATE TABLE people (
             id INTEGER PRIMARY KEY AUTOINCREMENT,
             name VARCHAR(255),
     email VARCHAR(255)
 );
     ");
  }

  protected function getConnection()
  {
      return $this->createDefaultDBConnection($this->connection, 'sqlite');
  }

  protected function getDataSet()
  {
      return $this->createFlatXMLDataSet(dirname(__FILE__).'/people.xml');
  }

  public function testPeople()
  {
      $sql = "SELECT * FROM people";
      $statement =
          $this->getConnection()->getConnection()->query($sql);
      $result = $statement->fetchAll();
      $this->assertEquals(1, sizeof($result));
      $this->assertEquals('John', $result[00]['name']);
  }

  public function testAdditionalPeople()
  {
    $insertOperation = PHPUnit_Extensions_Database_Operation_Factory::INSERT();
    $insertOperation->execute($this->getConnection(), $this->createFlatXMLDataSet(dirname(__FILE__).'/additionalPeople.xml'));
    $sql = "SELECT * FROM people";
    $statement = $this->getConnection()->getConnection()->query($sql);
    $result = $statement->fetchAll();
    $this->assertEquals(3, sizeof($result));
    $this->assertEquals('John', $result[00]['name']);
    $this->assertEquals('Johnny', $result[1]['name']);
    $this->assertEquals('Tom', $result[2]['name']);
  }


}