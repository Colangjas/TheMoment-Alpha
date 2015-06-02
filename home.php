<?PHP
	
	// Start the session
	require_once('startsession.php');

	// Insert the page header
	$page_title = 'Login';
	require_once('header.php');
	
	// Connect to the server
	require_once('connectvars.php');
	
	// Show the navigation menu
	require_once('navmenu.php');
	
?>	

<p>Enter you username and to sign up to The Moment Alpha.</p>
		<form method="post" action="<?PHP echo $_SERVER['PHP_SELF']?>">
			<fieldset>
				<legend>Registration Info</legend>
				<label for="username">Username: </label>
				<input type="text" id="username" name="username" value="<?PHP if (!empty($username)) echo $username; ?>" /><br />
			</fieldset>
			<input type="submit" value="Sign Up" name="submit" />
		</form>

<?PHP
	
	// The user already has a log-in and needs to update their current sheet
	// Grab the user-entered log-in data
	$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	
	if (!empty($user_username)) {
				// Look up the username in the database
				$query="SELECT user_id, username  FROM users WHERE username = '$user_username'";
				$data = mysqli_query($dbc, $query);
				
				if (mysqli_num_rows($data) == 1) {
					// The log-in is ok so set the user ID and username session vars (and cookies), and redirect to the home page
					$row = mysqli_fetch_array($data);
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['username'] = $row['username'];
					setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30)); // expires in 30 days
					setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30)); // expires in 30 days
					$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/mindex.php';
					header('Location: ' . $home_url);
				}else {
					// The username/password are incorrect so set an error message
					$error_msg	= 'You must enter your username and password to log in.';		
			}
		}else {
					// The username/password are incorrect so set an error message
					$error_msg	= 'You must enter your username and password to log in.';		
			}

?>

<p>Enter you username and to login to The Moment Alpha.</p>
		<form method="post" action="<?PHP echo $_SERVER['PHP_SELF']?>">
			<fieldset>
				<legend>Login Info</legend>
				<label for="username">Username: </label>
				<input type="text" id="username" name="username" value="<?PHP if (!empty($username)) echo $username; ?>" /><br />
			</fieldset>
			<input type="submit" value="Sign Up" name="submit" />
		</form>
