<?php
$servername = "localhost";
$port_no = 3306;
$username = "root";
$password__ = "";
$myDATAbase = "lms";

try {
    $conn = new PDO("mysql:host=$servername;port=$port_no;dbname=$myDATAbase", $username, $password__);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connect";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>