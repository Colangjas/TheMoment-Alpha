<?PHP
	// Disable error reporting
	// error_reporting(E_ALL ^ E_NOTICE);
	// Start the session
	require_once('startsession.php');

	// Insert the page header
	$page_title = 'Tracker';
	require_once('header.php');
	
	// Connect to the server
	require_once('connectvars.php');
	
	// Show the navigation menu
	require_once('navmenu.php');
	
	
	// Connect to the database
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	
		
		
	mysqli_close($dbc);
?>	



<p>Feeling anxious, depressed and/or stressed? Track it!</p>
		<form method="post" action="<?PHP echo $_SERVER['PHP_SELF']?>">
			<fieldset>
				<legend>Track My Emotions</legend>
				<label for="q1">What's Wrong?</label>
        <select name="q1">
            <option value="anxious">Anxious</option>
            <option value="stressed">Stressed</option>
            <option value="mad">Mad</option>
            <option value="frustrated">Frustrated</option>
            <option value="lonely">Lonely</option>
            <option value="depressed">Depressed</option>
            <option value="afraid">Afraid</option>
            <option value="paranoid">Paranoid</option>
            <option value="seeingThings">Seeing Things</option>
            <option value="hearingThings">Hearing Things</option>
            <option value="substanceUse">Substance Use</option>
            <option value="alcoholUse">Alcohol Use</option>
            <option value="suicidal">Suicidal Thoughts</option>
            <option value="other">Other</option>
        </select><br />
		
		<label for="q2">Rate Your Level of Emotion:</label>
        <div id="moods">
            <ul>
                <li><img src="_images/mood01.png" alt="Happy" /></li>
                <li><img src="_images/mood02.png" alt="Content" /></li>
                <li><img src="_images/mood03.png" alt="Ok" /></li>
                <li><img src="_images/mood04.png" alt="Depressed" /></li>
                <li><img src="_images/mood05.png" alt="Sad" /></li>
            </ul>
        </div>
        <input type="range" name="q2" min="1" max="10" id="q2" />
        <br /><br />
		
		 <label for="q3">Trigger:</label>
        <select name="q3">
            <option value="self">Self</option>
            <option value="family">Family</option>
            <option value="work">Work</option>
            <option value="school">School</option>
            <option value="friends">Friends</option>
            <option value="relationships">Relationships</option>
            <option value="other">Other</option>
        </select>
		<label for="q4">Duration (hours):</label>
        <input type="number" id="q4" name="q4" placeholder="1" />
			</fieldset>
			<input type="submit" value="Submit" name="submit" />
		</form>
