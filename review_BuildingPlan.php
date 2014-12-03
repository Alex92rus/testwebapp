<?php 
    // Start MySQL Connection
    include('pdbconnect.php'); 
?>

<html>
<head>
    <title>Current State</title>
    <link rel="stylesheet", type="text/css", href="nav_bar.css">
    <link rel="stylesheet", type="text/css", href="main_style.css">
</head>

    <body>
        <div class="title">
            <h1>Building Plan</h1>
        </div>
        <?php include 'navigation_bar.php';?>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            <td class="table_titles">Door</td>
            <td class="table_titles">Room one</td>
            <td class="table_titles">Room two</td>
     </tr>
<?php
    // Retrieve all records and display them
    $result = mysql_query("SELECT * FROM BuildinPlan ORDER BY DoorID ASC");

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
        echo '   <td'.$css_class.'>'.$row["DoorID"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Room1ID"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Room2ID"].'</td>';
        echo '</tr>';
    }
?>
    </table>
    </body>
</html>