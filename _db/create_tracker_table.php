<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Create moment_alpha_user TABLE</title>
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "CREATE TABLE moment_alpha_tracker (

	record_id INT NOT NULL AUTO_INCREMENT,
	user_id INT,
	time DATETIME DEFAULT NOW(),
	trigger VARCHAR(20),
	emo_lvl INT,
	duration INT(10),
	place VARCHAR(20),
	av_cope VARCHAR(150),
	cr_cope VARCHAR(150),
	thoughts VARCHAR(150),
	PRIMARY KEY (record_id)

";
 
if (mysqli_query ($dbc, $query)) {
 	echo "The query was successfully executed!<br />";
} else {
 	echo "The query could not be executed!" . mysqli_error($dbc);
} 
mysqli_close($dbc);
?>
</body>
</html>