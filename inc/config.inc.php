<?php

$dbServerName = "localhost";
$dbUsername = "arsbd";
$dbPassword = "6Vgm(VmLCkJlcl*L";
$databaseName = "arsbd";

$db = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $databaseName);

if (!$db) {
    die("Connection Failed ! " . mysqli_connect_errno());
}
