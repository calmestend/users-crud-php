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
	<form action="/mvc_users/update.php" method="POST">
    	<label for="username">Username</label>
    	<input type="text" name="username" id="username" required value="<?php echo htmlspecialchars(
         $user["username"]
     ); ?>">
    	<label for="email">Email</label>
    	<input type="email" name="email" id="email" required value="<?php echo htmlspecialchars(
         $user["email"]
     ); ?>">

        <input type="hidden" name="user_id" id="user_id"
            value="<?php echo htmlspecialchars($user["user_id"]); ?>">
     <button type="submit">Update User</button>
	</form>
	<br>
	<?php endforeach; ?>

</body>
</html>
