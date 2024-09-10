<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Users</title>
</head>
<body>
    <?php require "nav.php"; ?>
	<h1>Update Users</h1>

	<?php foreach ($users as $user): ?>
	<form action="/mvc_users/update.php" method="post">
    	<label for="username">Username</label>
    	<input type="text" name="username" id="username">
    	<label for="email">Email</label>
    	<input type="email" name="email" id="email">
    	<label for="password">Password</label>
    	<input type="text" name="password" id="password">
	</form>
	<?php endforeach; ?>

</body>
</html>
