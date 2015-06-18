<?PHP
	// Disable error reporting
	error_reporting(E_ALL ^ E_NOTICE);
	// Start the session
	require_once('startsession.php');

	// Insert the page header
	$page_title = 'Login';
	require_once('header.php');
	
	// Connect to the server
	require_once('connectvars.php');
	
	// Show the navigation menu
	require_once('navmenu.php');
	
	
	// Connect to the database
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	// Login username
	if (!isset($_SESSION['user_id'])){	
		$login_username = mysqli_real_escape_string($dbc, trim($_POST['lusername']));
		if (!empty($login_username)) {
					// Look up the username in the database
					$query="SELECT user_id, username  FROM moment_alpha_user WHERE username = '$login_username'";
					$data = mysqli_query($dbc, $query);
					
					if (mysqli_num_rows($data) == 1) {
						// The log-in is ok so set the user ID and username session vars (and cookies), and redirect to the home page
						$row = mysqli_fetch_array($data);
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['username'] = $row['username'];
						setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30)); // expires in 30 days
						setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30)); // expires in 30 days
						$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/tracker.php';
						header('Location: ' . $home_url);
						
						echo'<section class="warning"><p>Login Successful!</p></section>';
						
					}else {
						// The username/password are incorrect so set an error message
						$error_msg	= 'You must enter your username to log in.';		
				}
			}else {
						// The username/password are incorrect so set an error message
						$error_msg	= 'You must enter your username to log in.';		
				}
	}else{echo '<section class="warning"><p class="error">You are logged in as ' . $_SESSION['username'] . '. If this isn\'t you please logout and sign in again</p></section>';}
			
		if (!isset($_SESSION['user_id'])){
			if (isset($_POST['submit'])) {
					// Registration username
				// Grab the profile data from the POST
				$reg_username = mysqli_real_escape_string($dbc, trim($_POST['rusername']));
				
				if (!empty($reg_username)) {
					// Make sure someone isn't already registered using this username
					$query = "SELECT * FROM moment_alpha_user WHERE username = '$reg_username'";
					$data = mysqli_query($dbc, $query);
					if (mysqli_num_rows($data) == 0) {
						// The username is unique, so insert the data into the database
						$query = "INSERT INTO moment_alpha_user (username, join_date) VALUES ('$reg_username', NOW())";
						mysqli_query($dbc, $query);
						
						// Confirm success with user
						echo'<section class="warning"><p>Your new account has been successfully created. You\'re now ready to <a class="onblack" href="home.php">log in</a></p></section>';
						
						mysqli_close($dbc);
						exit();
					} else {
						// An account already exists for this username, so display an error message
						echo '<section class="warning"><p class="error">An account already exists for this username. Use a different one.</p></section>';
						$reg_username = "";
				}
			} else {
				echo'<section class="warning"><p class="error">You must enter all of the sign-up data.</p>';
				}
			}
		}else {echo'<section class="warning"><p>You must <a class="onblack" href="logout.php">logout</a> to register a new account.</p></section>';}
		
		
		mysqli_close($dbc);
?>	



<section class="forms">
	<div class="register">
		<p>To Register enter a username and to sign up to The Moment Alpha.</p>
				<form method="post" action="<?PHP echo $_SERVER['PHP_SELF']?>">
					<fieldset>
						<legend>Registration Info</legend>
						<p>
							<label for="remail">Email: </label>
							<input type="email" id="remail" name="remail" value="<?PHP if (!empty($reg_username)) echo $reg_username; ?>" required />
						</p>
						<p><label for="rusername">Username: </label>
							<input type="text" id="rusername" name="rusername" value="<?PHP if (!empty($reg_username)) echo $reg_username; ?>" maxlength="20" required />
						</p>
						<p>
							<label for="rpassword">Password: </label>
							<input type="password" id="rpassword" name="rpassword" maxlength="20" required />
						</p>
					</fieldset>
					<input type="submit" value="Sign Up" name="submit" />
				</form>
	</div>
	
	
	
	<div class="login">
		<p>To login enter your username and to login to The Moment Alpha.</p>
				<form method="post" action="<?PHP echo $_SERVER['PHP_SELF']?>">
					<fieldset>
						<legend>Login Info</legend>
						<p>
							<label for="lusername">Username: </label>
							<input type="text" id="lusername" name="lusername" value="<?PHP if (!empty($login_username)) echo $login_username; ?>" required  />
						</p>
						<p>
							<label for="lpassword">Password: </label>
							<input type="password" id="lpassword" name="lpassword" maxlength="20" required />
						</p>
					</fieldset>
					<input type="submit" value="Login" name="login" />
				</form>
	</div>
</section>
