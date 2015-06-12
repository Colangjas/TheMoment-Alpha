<?PHP
	// Generate the nanvigation menu
	echo '<hr />';
	if(isset($_SESSION['username'])) {
		echo'<a class="onblack" href="home.php">Home</a>&nbsp;&nbsp;&nbsp;';
		echo'<a class="onblack" href="tracker.php">Update Tracker</a>&nbsp;&nbsp;&nbsp;';
		echo'<a class="onblack" href="yresults.php" target="_blank">My Results</a>&nbsp;&nbsp;&nbsp;';
		echo'<a class="onblack" href="logout.php">Log Out <span style="color: red;">(' . $_SESSION['username'] . ')</span></a>';
	} else {
		echo'Please <a class="onblack" href="home.php">Log In</a> or make a Username.';
	}
	echo '<hr />';
?>