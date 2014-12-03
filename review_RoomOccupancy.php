<?php 
    // Start MySQL Connection
    include('pdbconnect.php'); 
?>

<html>
<head>
    <title>Data for room Occupancy</title>
    <link rel="stylesheet", type="text/css", href="main_style.css">
    <link rel="stylesheet", type="text/css", href="nav_bar.css">
</head>

    <body>
        <div class="title">
            <h1>Room Historical Data</h1>
        </div>
        <?php include 'navigation_bar.php';?>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            <td class="table_titles">ID</td>
            <td class="table_titles">Date and Time</td>
            <td class="table_titles">Room</td>
            <td class="table_titles">People</td>
     </tr>
<?php
    // Retrieve all records and display them
    $result = mysql_query("SELECT * FROM RoomOccupancy ORDER BY Occid ASC");

    // Used for row color toggle
    $oddrow = true;

    // process every record
    while( $row = mysql_fetch_array($result) )
    {
        if ($oddrow) 
        { 
            $css_class=' class="table_cells_odd"'; 
        }
        else
        { 
            $css_class=' class="table_cells_even"'; 
        }

        $oddrow = !$oddrow;

        echo '<tr>';
        echo '   <td'.$css_class.'>'.$row["OccID"].'</td>';
        echo '   <td'.$css_class.'>'.$row["EventTime"].'</td>';
        echo '   <td'.$css_class.'>'.$row["RoomID"].'</td>';
        echo '   <td'.$css_class.'>'.$row["NumberOfPeople"].'</td>';
        echo '</tr>';
    }
?>
    </table>
    </body>
</html>