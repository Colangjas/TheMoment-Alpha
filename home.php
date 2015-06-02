<?PHP
	
	// Start the session
	require_once('startsession.php');

	// Insert the page header
	$page_title = 'Login';
	require_once('header.php');
	
	// Connect to the server
	require_once('connectvars.php');
	
	// Make sure the user is logged in before going any further.
	if (!isset($_SESSION['user_id'])) {
		echo '<p class="login">Please <a href="home.php">log in</a> to access this page.</p>';
		exit();
	}
	
	// Show the navigation menu
	require_once('navmenu.php');

?>
