<html>
<head>
	<title>QualPredict</title>
</head>
<body>


<?php
	$servername = "eu-cdbr-azure-west-b.cloudapp.net";
	$username = "b3b21f82f37a55";
	$password = "053b9433";
	$dbname = "CommonRoom";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO b42Snapshot (DoorID, event_time, transition, Confidence, Readed)
VALUES ('D1', '2014-10-11 12:22:12', '1', '50', '10')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
</html>