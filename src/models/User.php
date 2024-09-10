<?php
use PDO;

class User
{
    private PDO $conn;

    private int $user_id;
    private string $username;
    private string $email;
    private string $password;
    private bool $active;
    private string $created_at;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function select(): array
    {
        $query = "SELECT * FROM users";

        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectByUsername(): array
    {
        $query = "SELECT * FROM users WHERE username = ?";

        $this->username = htmlspecialchars(strip_tags($this->username));

        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->username);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(): bool
    {
        $query =
            "INSERT INTO users (username, email, password, active) VALUES (?, ?, ?, 1)";
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->username);
        $statement->bindParam(2, $this->email);
        $statement->bindParam(3, $this->password);

        return $statement->execute() ? true : false;
    }

    public function activeHandler(): bool
    {
        $query = "UPDATE users SET active = ? WHERE user_id = ?";

        $this->active = htmlspecialchars(strip_tags($this->active));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->active ? 1 : 0);
        $statement->bindParam(2, $this->user_id);

        return $statement->execute() ? true : false;
    }

    public function update(): bool
    {
        $query = "UPDATE users SET username = ?, email = ?, password = ?";

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->username);
        $statement->bindParam(2, $this->email);
        $statement->bindParam(3, $this->password);

        return $statement->execute() ? true : false;
    }
}
