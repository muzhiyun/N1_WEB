<?php

$servername="localhost";
$username="yiju";
$passwd="Myyiju2017..";
$dbname="yiju";

$conn=new mysqli($servername,$username,$passwd,$dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

?>