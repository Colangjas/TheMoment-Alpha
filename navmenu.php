<?PHP
	// Generate the nanvigation menu
	echo '<hr />';
	if(isset($_SESSION['username'])) {
		echo'<a href="home.php">Home</a>';
		echo'<a href="yresults.php">My Results</a>';
		echo'<a href="logout.php">Log Out <span style="color: red;">(' . $_SESSION['username'] . ')</span></a>';
	} else {
		echo'Please <a href="login.php">Log In</a> or make a Username.';
	}
	echo '<hr />';
?>