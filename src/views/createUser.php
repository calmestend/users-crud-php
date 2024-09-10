<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create User</title>
</head>
<body>
    <?php require "nav.php"; ?>

    <h1>Create User</h1>
		<form action="/create.php" method="POST">
		    <label for="username">Username</label>
			<input type="text" name="username" id="username">

		    <label for="email">Email</label>
			<input type="email" name="email" id="email">

		    <label for="password">Password</label>
			<input type="password" name="password" id="password">

			<button type="submit">Create User</button>
		</form>
</body>
</html>
