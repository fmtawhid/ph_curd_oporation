<?php

    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "test");


    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if(!$connection){
        die (" Hello Faild ");
    }
    else{
        
    }


?>