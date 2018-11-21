<html>
<head>
<title>User Search</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
	<a href="index.php">Home</a>
	<a href="add.php">New User</a>
	<a href="search.php" class="current">Search for User</a>
	<a href="users.php">List Users</a>
</nav>
<h1>Sample Database Testing Lab</h1>
<h2>User Search</h2>
<?php
if(isset($_POST['submit'])){
	// ADD DB CONNECTION INFO HERE:
	$dbhost = '';
	$dbuser = '';
	$dbpass = '';
	$dbname = '';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$conn){
		die("Could not connect to database");
	}
	if(! get_magic_quotes_gpc() ) {
		$search = addslashes ($_POST['search']);
	}else{
		$search = $_POST['search'];
	}

	$sql = "SELECT * FROM users WHERE last_name LIKE '%" . $search . "%'";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		die("Could not get data: " . mysqli_error($sql));
	}

	echo "<table>";
	echo "<tr><td><u>ID</u></td><td><u>Username</u></td><td><u>First Name</u></td><td><u>Last Name</u></td></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr><td>" . $row['id'] . "</td><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['first_name']) . "</td><td>" . htmlspecialchars($row['last_name']) . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($conn);
} else {
?>

<form action="" method="POST">
Last Name:<br>
<input name="search" type="text" /><br>
<input name="submit" type="submit" value="Search" /><br>
<?php
}
?>

</body>
</htmL>
