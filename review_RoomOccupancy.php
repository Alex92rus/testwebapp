<?php 
    // Start MySQL Connection
    include('pdbconnect.php'); 
?>

<html>
<head>
    <title>Data for room Occupancy</title>
    <style type="text/css">
        .title {
          float: none;
          text-align:center;
        }
        table {
          margin-left:auto;
          margin-right:auto;
        }
        .table_titles, .table_cells_odd, .table_cells_even {
                padding-right: 20px;
                padding-left: 20px;
                color: #000;
        }
        .table_titles {
            color: #FFF;
            background-color: #666;
        }
        .table_cells_odd {
            background-color: #CCC;
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        table {
            border: 2px solid #333;
        }
        body { font-family: "Trebuchet MS", Arial; }
    </style>
    <link rel="stylesheet", type="text/css", href="nav_bar.css">
</head>

    <body>
        <div class="title">
            <h1>Room Historical Data</h1>
        </div>
        <div class="navigation">
            <ul id="nav">
                <li id="nav-log"><a href="">Android Log</a></li>
                <li id="nav-current"><a href="">Current State</a></li>
                <li id="nav-plan"><a href="">Building Plan</a></li>
                <li id="nav-occupancy"><a href="">Room Occupancy</a></li>
            </ul>
        </div>
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