<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='registration'; 

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);


if ($con) {
    echo 'Database connect';
}else{
    die(mysqli_error($con));
}


?>