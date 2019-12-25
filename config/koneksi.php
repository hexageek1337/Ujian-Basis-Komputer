<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "appujian";
$koneksi = new mysqli($server, $username, $password, $database);
if ($koneksi->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
    return FALSE;
} else {
	return TRUE;
}