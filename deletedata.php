<?php

$delete_ID  = $_REQUEST['employeeID'];

require('config.php');

$sql = '
    DELETE FROM employee
    WHERE employeeID = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    header('location:index.php');
} else {
    echo "Error : Delete";
}

mysqli_close($conn);
?>
