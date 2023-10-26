<?php
    $serverName = "dbnewserver.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "app_ai", // update me
        "Uid" => "sqladmin", // update me
        "PWD" => "adminSql@1234" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT * FROM kareena";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ($conn)
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);
?>