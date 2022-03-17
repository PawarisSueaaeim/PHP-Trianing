<?php

define('servername' , 'localhost');
define('username' , 'root');
define('password' , '12345678');
define('dbname','jquery_php');

$conn = mysqli_connect(servername, username, password, dbname);

if (mysqli_connect_errno()) {
    echo "Connection failed : " . mysqli_connect_error();
}

?>