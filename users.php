<html>
<head>
<title>User List</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
	<a href="index.php">Home</a>
	<a href="add.php">New User</a>
	<a href="search.php">Search for User</a>
	<a href="users.php" class="current">List Users</a>
</nav>
<h1>Sample Database Testing Lab</h1>
<h2>User Database</h2>
<p>
<?php
// ADD DB CONNECTION IFNO HERE:
$dbhost = '';
$dbuser = '';
$dbpass = '';
$dbname = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn ){
	die("could not connect to DB: " . mysqli_error());
}
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if (! $result ) {
	die('Could not get data: ' . mysqli_error($query));
}

echo "<table>";
echo "<tr><td><u>ID</u></td><td><u>Username</u></td><td><u>First Name</u></td><td><u>Last Name</u></td></tr>";
while($row = mysqli_fetch_array($result)){
	echo"<tr><td>" . $row['id'] . "</td><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['first_name']) . "</td><td> ". htmlspecialchars($row['last_name']) . "</td></tr>";
}
echo "</table>";
mysqli_close($conn);
?>

</body>
</html>
