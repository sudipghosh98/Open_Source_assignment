<?php
$linl=mysqli_connect("localhost","root","123456789");
$sq="create database assignment8;";
$qur1=mysqli_query($linl,$sq);

if($qur1){
    echo "Database created";
}
else{
    echo "already created";
}
$linl=mysqli_connect("localhost","root","123456789","assignment8");
$sq1="create table movie_detail (ID int(10) AUTO_INCREMENT PRIMARY KEY, movie_name varchar(50), average_rating float(4,2), user int(10));";
$qur1=mysqli_query($linl,$sq1);
if($qur1){
    echo "Table Created";
}
else{
    echo "table already created";
}
?>
