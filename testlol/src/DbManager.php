<?php 
class Database
{
    protected static $_instance = null;
    protected $pdo;

    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = 'toortoor';
    const DB_NAME = 'parser';
    const DB_TYPE = 'mysql';

    private function __construct() {
        try
        {
            $this->pdo = new PDO(self::DB_TYPE.':host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
        }
        catch (PDOException $e) {
            echo "DB error";
            file_put_contents('logs/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
    }
    private function __clone() {}

    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self;
            try
            {
                self::$_instance = new PDO(self::DB_TYPE.':host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
            }
            catch (PDOException $e) {
                echo "DB error";
                file_put_contents('logs/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
            }
        }
        return self::$_instance;
    }

    public static function tearDown()
    {
        static::$_instance = null;
    }

    public function doQuery($sql, $arr = null) 
    {
        $q = $this->pdo->prepare($sql);
        return  $q->execute($arr);
    }   

    public  function deleteFrom($db_name, $id)
    {
        $sql = "DELETE FROM $db_name WHERE id=:id";
        $q = $this->pdo->prepare($sql);
        $q->bindParam(':id', $id, PDO::PARAM_INT); 
        return  $q->execute();
    }

    public function selectAll($db_name)
    {
        $sql = "SELECT * FROM $db_name";
        foreach($this->pdo->query($sql) as $row){
        echo "<li>{$row['name']} ";
        echo "{$row['email']}</li>";
        }
    }

    public function quote($item)
    {
        $obj = $this->pdo;
        return $obj->quote($item);
    }
}

