<?php
$dbServer = "localhost";
$dbUserName =  'root';
$dbPassword = '';
// $dbPassword = 'GlobalSight@21';
$databaseName = "global76_airtel";


$conn = mysqli_connect($dbServer, $dbUserName, $dbPassword, $databaseName);

if (!$conn) {
    return "No connection " . mysqli_connect_error($conn) . $dbServer;
    // die('Connection failed' . mysqli_connect_error($conn));
} else {
    return "Connection Established";
}
// mysqli_close($conn);