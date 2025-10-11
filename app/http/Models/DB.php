<?php

namespace App\http\Models;
use PDO;

class DB
{
    public PDO $conn;

    function __construct($params = null)
    {
        if (!is_array($params)){
            $params = require __DIR__."/../../config/db.php";
        }
        $this->conn = new PDO(sprintf("%s:host=%s;dbname=%s", $params["driver"], $params["host"], $params["dbname"]), $params["user"], $params["pass"]);
    }

    public function query($sql, $params = []): int
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    public function select($sql, $params = [], $type = PDO::FETCH_NUM): false|array
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll($type);
    }

}