<?php
$MyUsername = "b3b21f82f37a55"; //mysql username
$MyPassword = "053b9433"; // password for mysql
$MyHostname = "eu-cdbr-azure-west-b.cloudapp.net"; // server on which it resides

$pdbh = mysql_connect($MyHostname, $MyUsername, $MyPassword);
$selected = mysql_select_db("CommonRoom", $pdbh);
?>