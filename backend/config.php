<?php
$servername  = "localhost";
$username = "tanmoyba_comc";
$password = "%L}uegA;m_^(";
$dbname = "tanmoyba_comc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else{
//     echo "Connected";
// }
?>