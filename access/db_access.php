<?php

$conn = mysqli_connect("localhost", "root", "", "dokteralatberat");

$date = new DateTime("now", new DateTimeZone('Asia/Makassar') );
$waktu = $date->format('Y-m-d H:i:s');
?>