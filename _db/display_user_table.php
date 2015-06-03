<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Display moment_alpha_user TABLE</title>
  <link href="../_css/style_table.css" rel="stylesheet" />
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


	$query = "SELECT * from moment_alpha_user";
	$result = mysqli_query ($dbc, $query) or die("Error querying database ".mysqli_error($dbc));
	// mismatrch table
	
	echo "<table border='1'; align='center'; style='text-align:center;'>";
	echo "<tr style='background-color:lightblue; text-align:center;'>";
	echo "<th>ID</th>";
	echo "<th>USER NAME</th>";
	echo "<th>JOIN DATE</th>";
	echo "</tr>";

	// Fetch the results from the database.
	while ($Row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
		echo "<tr>";
		echo "<td>$Row[user_id]</td>";
		echo "<td>$Row[username]</td>";
		echo "<td>$Row[join_date]</td>";
		echo "</tr>";
	}
	echo "</table>";
mysqli_close($dbc);
?>
</body>
</html>