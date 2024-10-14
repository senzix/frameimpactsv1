<?php 
//connect to database

class Database{
    protected $pdo;

    public function __construct($config) {
        if (!isset($config['dsn'], $config['username'], $config['password'])) {
            throw new InvalidArgumentException('Invalid database configuration');
        }
        $this->pdo = new PDO($config['dsn'], $config['username'], $config['password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $parameters = []) {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);
        return $statement;
    }
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}