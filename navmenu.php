<?PHP
	// Generate the nanvigation menu
	echo '<hr />';
	if(isset($_SESSION['username'])) {
		echo'<a href="home.php">Home</a>&nbsp;';
		echo'<a href="tracker.php">Update Tracker</a>&nbsp;';
		echo'<a href="yresults.php">My Results</a>&nbsp;';
		echo'<a href="logout.php">Log Out <span style="color: red;">(' . $_SESSION['username'] . ')</span></a>';
	} else {
		echo'Please <a href="home.php">Log In</a> or make a Username.';
	}
	echo '<hr />';
?>