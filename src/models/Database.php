<?php
use PDO, PDOException;

class Database
{
    private PDO $pdo;

    private string $host = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $name = "mvc_users";
    private string $charset = "utf8mb4";

    public function connection(): PDO
    {
        $attr = "mysql:host={$this->host};
		dbname={$this->name};
		charset={$this->charset}";
        try {
            $this->pdo = new PDO($attr, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        } catch (PDOException $error) {
            die("Connection Error: " . $error->getMessage());
        }
    }
}
