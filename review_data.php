<?php 
    // Start MySQL Connection
    include('pdbconnect.php'); 
?>

<html>
<head>
    <title>Arduino transition Log</title>
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
</head>

    <body>
        <div class="title">
            <h1>Arduino transition Log</h1>
        </div>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            <td class="table_titles">ID</td>
            <td class="table_titles">Date and Time</td>
            <td class="table_titles">DoorID</td>
            <td class="table_titles">Transition</td>
            <td class="table_titles">Confidence</td>
     </tr>
<?php
    // Retrieve all records and display them
    $result = mysql_query("SELECT * FROM b42Snapshot ORDER BY Occid ASC");

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
        echo '   <td'.$css_class.'>'.$row["event_time"].'</td>';
        echo '   <td'.$css_class.'>'.$row["DoorID"].'</td>';
        echo '   <td'.$css_class.'>'.$row["transition"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Confidence"].'</td>';
        echo '</tr>';
    }
?>
    </table>
    </body>
</html>