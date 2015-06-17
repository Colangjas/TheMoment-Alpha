<?PHP

	// Start the session
	require_once('startsession.php');

	
	// Insert the page header
	$page_title = 'Results';
	require_once('tableheader.php');
	
	// Set the variables for the database access:
	require_once('connectvars.php');
  
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	$user_id = $_SESSION['user_id'];

	$query = "SELECT * FROM moment_alpha_tracker WHERE '$user_id' = user_id";
	$result = mysqli_query ($dbc, $query) or die("Error querying database ".mysqli_error($dbc));
	
	$testnum = 3373990000000;
	
	// mismatrch table
	
	echo "<table border='1'; align='center'; style='text-align:center;'>";
	echo "<tr style='background-color:lightblue; text-align:center;'>";
	echo "<th>ID</th>";
	echo "<th>USER ID</th>";
	echo "<th>DATE</th>";
	echo "<th>TIME</th>";
	echo "<th>FEELING</th>";
	echo "<th>TRIGGER</th>";
	echo "<th>EMOTIONAL LEVEL</th>";
	echo "<th>DURATION</th>";
	echo "<th>LOCATION</th>";
	echo "<th>CURRENT COPING</th>";
	echo "<th>THOUGHTS</th>";
	
	echo "</tr>";

	// Fetch the results from the database.
	while ($Row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
		echo "<tr>";
		echo "<td>$Row[record_id]</td>";
		echo "<td>$Row[user_id]</td>";
		echo "<td>$Row[t_date]</td>";
		echo "<td>$Row[t_time]</td>";
		echo "<td>$Row[feeling]</td>";
		echo "<td>$Row[t_trigger]</td>";
		echo "<td>$Row[emo_lvl]</td>";
		echo "<td>$Row[duration]</td>";
		echo "<td>$Row[place]</td>";
		echo "<td>$Row[cope_str]</td>";
		echo "<td>$Row[thoughts]</td>";
		echo "</tr>";
	}
	echo "</table>";
	
?>

<div id="series_chart_div" style="width: 1280px; height: 700px;"></div>




<form>
	<input type="button" value="Print This Page" onClick="window.print()"
</form>

		
		    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

var tableLength = document.querySelector('tbody').children.length-1;

var dateTimeLine;

var tableDate;
var tableTime;
var duration;
var mood;
var feeling;

var tData = [['ID', 'Date', 'Moment Duration', 'Feeling',     'Mood Level']];

for (i=0; i<tableLength; i++) {
	
			tableDate = document.querySelector('tbody').children[i+1].children[2].textContent;
			tableTime = document.querySelector('tbody').children[i+1].children[3].textContent;
			duration = document.querySelector('tbody').children[i+1].children[7].textContent;
			duration = parseInt('duration');
			mood = document.querySelector('tbody').children[i+1].children[6].textContent;
			mood = parseInt('mood');
			feeling = document.querySelector('tbody').children[i+1].children[4].textContent;
			dateTimeLine = Date.parse(tableDate);
			
			tData.push(['<?PHP echo"$user_id"; ?>',    dateTimeLine,              duration,      feeling,         mood]);
			console.log(tData)
			
			randNum1 = Math.floor(Math.random()*10);
			// randNum2 = Math.floor(Math.random()*90);
			randNum3 = Math.random()*2;
			randNum4= Math.floor(Math.random()*3);
			randNum5 = Math.floor(Math.random()*40000000);
			
			
		}

 var data = google.visualization.arrayToDataTable(tData);

      var options = {
        title: 'This is a test chart to see if I can develop this app',
        hAxis: {title: 'Time'},
        vAxis: {title: 'Moment Duration'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>
		
	
	<?PHP
	
	
	mysqli_close($dbc);
	?>
	
</body>
</html>