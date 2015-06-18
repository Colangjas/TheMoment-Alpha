<?PHP
	// Generate the nanvigation menu
	echo '<nav>';
	echo '<ul>';
	if(isset($_SESSION['username'])) {
		echo'<li><a class="onblack" href="home.php">Home</a></li>';
		echo'<li><a class="onblack" href="tracker.php">Update Tracker</a></li>';
		echo'<li><a class="onblack" href="yresults.php" target="_blank">My Results</a></li>';
		echo'<li><a class="onblack" href="logout.php">Log Out <span style="color: red;">(' . $_SESSION['username'] . ')</span></a></li>';
	} else {
		echo'Please <li>
			<a class="onblack" href="home.php">Log In</a>
		</li> or make a Username.';
	}
	echo '</ul>';
	echo '</nav>';
?>