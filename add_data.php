<?php
    // Connect to MySQL
    include("pdbconnect.php");

    // Prepare the SQL statement
    $SQL = "INSERT INTO b42Snapshot (DoorID, event_time,transition, Confidence) VALUES ('".$_GET["DoorID"]."', NOW(), '".$_GET["transition"]."', '".$_GET["Confidence"]."')";     

    // Execute SQL statement
    mysql_query($SQL);

    // Go to the review_data.php (optional)
    header("Location: review_data.php");
?>