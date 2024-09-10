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
        require "src/views/createUser.php";
    }

    public function deleteUser(): void
    {
        $users = $this->user->select();
        require "src/views/deleteUser.php";
    }

    public function updateUser(): void
    {
        $users = $this->user->select();
        require "src/views/updateUser.php";
    }
}

?>
