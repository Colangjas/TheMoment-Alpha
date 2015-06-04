<?PHP
	// Disable error reporting
	// error_reporting(E_ALL ^ E_NOTICE);
	// Start the session
	require_once('startsession.php');

	// Insert the page header
	$page_title = 'Submit';
	require_once('header.php');
	
	// Connect to the server
	require_once('connectvars.php');
	
	// Show the navigation menu
	require_once('navmenu.php');
	
	// Declare date and time variables
	$date = date('Y-m-d');
	$time = date('g:i A');
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];
	$q6 = $_POST['q6'];
	$q7 = $_POST['q7'];
	$user_id = $_SESSION['user_id'];
	
	// Connect to the database
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	
	$query = "INSERT INTO moment_alpha_tracker 
			VALUES ('0','$user_id',NOW(),'$time','$q1','$q2','$q3','$q4','$q5','$q6','$q7')";
	
	if (mysqli_query($dbc,$query)) {
    echo "<p>Thank you for tracking your current emotions.</p>";
    echo "<p>Review your results <a class='onblack' href='yresults.php' target='_blank'>here</a>.</p>";
	}else{echo"The form was not submitted" . mysqli_error($dbc);}

		
		
	mysqli_close($dbc);
?>	
