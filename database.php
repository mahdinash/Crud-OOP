<?php
require_once("config.php");

class Database
{

    private $connection;

    function __construct()
    {
        $this->openConnection();
    }

    public function openConnection()
    {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        if (!$this->connection) {
            die("Database connection failed: " . mysqli_error($this->connection));
        }
        $db_select = mysqli_select_db($this->connection, DB_NAME);
        if (!$db_select) {
            die("Database selection failed: " . mysqli_error($this->connection));
        }
    }

    public function execute($sql_query)
    {
        // $sql_query = mysqli_real_escape_string($this->connection, $sql_query);
        $result = mysqli_query($this->connection, $sql_query);
        if (!$result) {
            die("Database query failed: " . mysqli_error($this->connection));
        }
        return $result;
    }

    public function fetch($sql_query)
    {
        $result = $this->execute($sql_query);
        $output = [];
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_object($result)) {
                $output []= $row;
            }
        }
        return $output;
    }

    public function get($sql_query)
    {
        $result = $this->execute($sql_query);
        return mysqli_fetch_object($result);
    }

    public function closeConnection()
    {
        if(isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    function __destruct()
    {
        $this->closeConnection();
    }
}

$db = new Database;
