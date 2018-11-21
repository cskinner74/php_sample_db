<html>
<head>
<title>Sample Database Entry</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
	<a href="index.php">Home</a>
	<a href="add.php" class="current">New User</a>
	<a href="search.php">Search for User</a>
	<a href="users.php">List Users</a>
</nav>
<h1>Sample Database Testing Lab</h1>
<h2>Add User</h2>

<?php
if(isset($_POST['submit'])) {
	// ADD DB CONNECTION INFO HERE:
	$dbhost = 'localhost';
	$dbuser = '';
	$dbpass = '';
	$dbname = '';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if(!$conn) {
		die("Could not connect to DB\n"); // . mysqli_connect_error());
	}
	if(! get_magic_quotes_gpc() ) {
		$username = addslashes ($_POST['username']);
		$first_name = addslashes ($_POST['first_name']);
		$last_name = addslashes ($_POST['last_name']);
	}else {
		$username = $_POST['username'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
	}

	$sql = "INSERT INTO users (username, first_name, last_name) VALUES ('$username', '$first_name', '$last_name');";

	mysqli_query($conn, $sql) or die(mysqli_error($conn));
	echo "User added!<br><p>";
	mysqli_close($conn);
} else {
?>

<p>
<form action="" method="POST">
Username:<br>
<input name="username" type="text" /><br>
First Name:<br>
<input name="first_name" type="text" /><br>
Last Name:<br>
<input name="last_name" type="text" /><br>
<input name="submit" type="submit" value="Submit" /><br>
<?php
}
?>

</body>
</html>
