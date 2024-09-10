<?php
require "src/models/Database.php";
require "src/models/User.php";
require "src/controllers/UserController.php";
$userController = new UserController();
$userController->deleteUser();
