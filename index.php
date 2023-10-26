<!--/home2/digit46n/public_html/send-->
<!--serverName = azureserver.mysql.database.azure.com-->
<!--admin username = myserver-->
<!--password = adminRoot@1234-->
<!--database":"mydatabase-->
<?php

$serverName = "dbnewserver.database.windows.net";
$connectionOptions = array(
    "database" => "app_ai",
    "uid" => "sqladmin",
    "pwd" => "adminSql@1234"
);

function exception_handler($exception) {
    echo "<h1>Failure</h1>";
    echo "Uncaught exception: " , $exception->getMessage();
    echo "<h1>PHP Info for troubleshooting</h1>";
   // phpinfo();
}

set_exception_handler('exception_handler');

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(formatErrors(sqlsrv_errors()));
}

// Select Query
$tsql = "SELECT @@Version AS SQL_VERSION";

// Executes the query
$stmt = sqlsrv_query($conn, $tsql);

// Error handling
if ($stmt === false) {
    die(formatErrors(sqlsrv_errors()));
}
?>

<h1> Success Results : </h1>

<?php
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['SQL_VERSION'] . PHP_EOL;
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

function formatErrors($errors)
{
    // Display errors
    echo "<h1>SQL Error:</h1>";
    echo "Error information: <br/>";
    foreach ($errors as $error) {
        echo "SQLSTATE: ". $error['SQLSTATE'] . "<br/>";
        echo "Code: ". $error['code'] . "<br/>";
        echo "Message: ". $error['message'] . "<br/>";
    }
}
?>



// echo "yfvuyfvy";
// $con = mysqli_init();
// mysqli_ssl_set($con,NULL,NULL, "/home2/digit46n/public_html/send/DigiCertGlobalRootCA.crt(1).pem", NULL, NULL);
// mysqli_real_connect($conn, "azureserver.mysql.database.azure.com", "myserver", "adminRoot@1234", "mydatabase", 3306, MYSQLI_CLIENT_SSL);



// $conn = mysqli_init();
// mysqli_ssl_set($conn,NULL,NULL, "/home2/digit46n/public_html/send/DigiCertGlobalRootCA.crt(1).pem", NULL, NULL);
// mysqli_real_connect($conn, 'azureserver.mysql.database.azure.com', 'myserver', 'adminRoot@1234', 'mydatabase', 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}echo "connected"
// $host = 'azureserver.mysql.database.azure.com';
// $username = 'myserver';
// $password = 'adminRoot@1234';
// $db_name = 'mydatabase';
// //echo ($host);
// //Initializes MySQLi
// $conn = mysqli_init();
// mysqli_real_connect($conn, $host, $username, $password, $db_name, 1433);
// echo "yfvyfv";
// //$conn = mysqli_init();
// echo ($conn);
// echo ($host);

// //Establishes the connection

// if (mysqli_connect_errno($conn)) {
// die('Failed to connect to MySQL: '.mysqli_connect_error());
// }
// mysqli_ssl_set($conn,$host,$username, "/home2/digit46n/public_html/send/DigiCertGlobalRootCA.crt(1).pem", $password, $db_name);

// // Establish the connection
// mysqli_real_connect($conn, $host, $username, $password, $db_name, 1433, NULL, mysqli_ssl_set);

// //If connection failed, show the error
// if (mysqli_connect_errno())
// {
//     die('Failed to connect to MySQL: '.mysqli_connect_error());
// }
// echo 'connected'
?>
