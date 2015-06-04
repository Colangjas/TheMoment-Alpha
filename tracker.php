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

?>	



<p>Feeling anxious, depressed and/or stressed? Track it!</p>
		<form method="post" action="submitted.php">
			<fieldset>
				<legend>Track My Emotions</legend>
				<div id="quest">
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
				</select>
				</div>
			
				<div id="moods">
				<label for="q2">Rate Your Level of Emotion:</label>
			
					<ul>
						<li><img src="_images/mood01.png" alt="Happy" /></li>
						<li><img src="_images/mood02.png" alt="Content" /></li>
						<li><img src="_images/mood03.png" alt="Ok" /></li>
						<li><img src="_images/mood04.png" alt="Depressed" /></li>
						<li><img src="_images/mood05.png" alt="Sad" /></li>
					</ul>
				<input type="range" name="q2" min="1" max="10" id="q2" />
				</div>
				
				<div id="quest">
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
				</div>
				
				<div id="quest">
				<label for="q4">Duration (hours):</label>
				<input type="number" id="q4" name="q4" placeholder="1" />
				</div>
				
				<div id="quest">
				<label for="q5">Place:</label>
				<select name="q5">
					<option value="home">Home</option>
					<option value="school">School</option>
					<option value="work">Work</option>
					<option value="other">Other</option>
				</select>
				</div>
				
				<div id="quest">
				<label for="q6">Coping Strategies:</label><br />
				<textarea name="q6" cols="30" rows="2" maxlength="150"></textarea>
				</div>
				
				<div id="quest">
				<label for="q7">Any Other Information:</label><br />
				<textarea name="q7" cols="30" rows="2" maxlength="150" placeholder="If you selected 'other' for any of the options or just want to clarify and give extra input please put it here."></textarea>
				</div>
			</fieldset>
				<input type="submit" value="Submit" name="submit" />
		</form>
