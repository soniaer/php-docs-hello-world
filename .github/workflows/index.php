<?php

$host = 'azureserver.mysql.database.azure.com';
$username = 'myserver';
$password = 'adminRoot@1234';
$db_name = 'mydatabase';

//Initializes MySQLi
$conn = mysqli_init();

echo ($conn);
echo ($host);

mysqli_ssl_set($conn,NULL,NULL, "/home2/digit46n/public_html/send/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

// Establish the connection
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

//If connection failed, show the error
if (mysqli_connect_errno())
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}



?>
