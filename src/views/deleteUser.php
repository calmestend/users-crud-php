<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete User</title>
</head>
<body>
        <?php require "nav.php"; ?>
		<h1>Delete User</h1>
		<?php foreach ($users as $user): ?>
		<form action="/delete.php" method="POST">
		    <p><?php htmlspecialchars($user->username); ?></p>
		    <p><?php htmlspecialchars($user->email); ?></p>
            <input type="hidden"
                value="<?php htmlspecialchars($user->user_id); ?>">
            <button type="submit">Delete User</button>
		</form>
		<?php endforeach; ?>
</body>
</html>
