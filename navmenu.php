<?PHP
	// Generate the nanvigation menu
	echo '<nav>';
	echo '<ul>';
	if(isset($_SESSION['username'])) {
		echo'<li><a class="onblack" href="home.php">Home</a></li>';
		echo'<li><a class="onblack" href="tracker.php">Update Tracker</a></li>';
		echo'<li><a class="onblack" href="yresults.php" target="_blank">My Results</a></li>';
		echo'<li><a class="onblack" href="logout.php">Log Out <span class="user">(' . $_SESSION['username'] . ')</span></a></li>';
	} else {
		echo'<li>
			<a class="onblack" href="home.php">Log In</a>
		</li>';
	}
	echo '</ul>';
	echo '</nav>';
?>