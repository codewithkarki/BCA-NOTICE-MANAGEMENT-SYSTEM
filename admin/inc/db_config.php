<!-- Connection.. -->
<?php
$hname='localhost';
$uname='root';
$pass='';
$db='bca_nms';

$con=mysqli_connect($hname,$uname,$pass,$db,3306);
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}
else {
    echo 'Connection successful';
}