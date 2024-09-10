<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Show Users</title>
</head>
<body>
    <?php require "nav.php"; ?>
	<h1>Show Users</h1>

	<?php foreach ($users as $user): ?>
        <p>Username: <?php echo htmlspecialchars($user["username"]); ?></p>
        <p>Email: <?php echo htmlspecialchars($user["email"]); ?></p>
        <p><?php echo htmlspecialchars(
            $user["active"] ? "is Active" : "is not Active"
        ); ?></p>
        <br>
        <hr>
    <?php endforeach; ?>

</body>
</html>
