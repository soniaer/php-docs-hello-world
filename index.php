<?php
    $serverName = "dbnewserver.database.windows.net";
    $connectionOptions = array(
        "Database" => "app_ai",
        "Uid" => "sqladmin",
        "PWD" => "adminSql@1234" 
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT * FROM kareena";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ($conn);
    echo ($getResults);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);
?>