<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Save Movie</title>
</head>
<body>

<?php 
// connect to the database
$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200348644', 'gc200348644', 'VbxSpHms');

// save form inputs into variables 
$Title = $_POST['title']; 
$Year = $_POST['year']; 
$Length = $_POST['length']; 
$url = $_POST['url']; 

// set up the SQL INSERT command
$sql = "INSERT INTO movies (title, year, length, url) VALUES (:title, :year, :length, :url)";

// create a command object and fill the parameters with the form values
$cmd = $conn->prepare($sql);
$cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
$cmd->bindParam(':year', $year, PDO::PARAM_INT);
$cmd->bindParam(':length', $length, PDO::PARAM_INT);
$cmd->bindParam(':url', $url, PDO::PARAM_STR, 100);

// execute the command
$cmd->execute();

// disconnect from the database
$conn = null;

// show confirmation
echo "Movie Saved";

?>
</body>
</html>
