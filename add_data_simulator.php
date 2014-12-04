<?php
    // Connect to MySQL
    include("pdbconnect.php");

    // Prepare the SQL statement
    $SQL = "INSERT INTO b42Snapshot (DoorID, event_time,transition, Confidence) VALUES ('".$_POST["DoorID"]."', NOW(), '".$_POST["transition"]."', '".$_POST["Confidence"]."')";     

    // Execute SQL statement
    mysql_query($SQL);

    // Go to the review_data.php (optional)
    header("Location: review_data.php");
?>