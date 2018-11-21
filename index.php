<html>
<head>
<title>Sample Database</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
	<a href="index.php" class="current">Home</a>
	<a href="add.php">New User</a>
	<a href="search.php">Search for User</a>
	<a href="users.php">List Users</a>
</nav>
<h1>Sample Database Testing Lab</h1>
<p>Testing environment for LAMP stack.
<br>Uses MySQL database, and provides the ability to store and view information.
<p><u>Validation</u>
<br>HTML characters are filtered before output through htmlspecialchars() to prevent XSS, and input is validated when stored to the database through magic_quotes and addslashes() to prevent SQLi.
</body>
</html>
