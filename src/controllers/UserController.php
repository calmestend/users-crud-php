<?php
class UserController
{
    private User $user;

    public function __construct()
    {
        $db = new Database();
        $this->user = new User($db->connection());
    }

    public function selectUsers(): void
    {
        $users = $this->user->select();
        require_once "src/views/showUsers.php";
    }

    public function createUser(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->user->setUsername($_POST["username"]);
            $this->user->setEmail($_POST["email"]);
            $this->user->setPassword($_POST["password"]);
            $this->user->insert();
        }
        require "src/views/createUser.php";
    }

    public function deleteUser(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            echo $_POST["user_id"];
            $this->user->setUserId($_POST["user_id"]);
            $this->user->activeHandler();
        }

        $users = $this->user->select();
        require "src/views/deleteUser.php";
    }

    public function updateUser(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->user->setUserId($_POST["user_id"]);
            $this->user->setEmail($_POST["email"]);
            $this->user->setUsername($_POST["username"]);
            $this->user->update();
        }
        $users = $this->user->select();
        require "src/views/updateUser.php";
    }
}

?>
