<?php
// $host       =   "localhost";
// $user       =   "root";
// $password   =   "";
// $database   =   "db_alokasi_laba";
// $host       =   "us-cdbr-east-03.cleardb.com";
// $user       =   "b0ed77d965f3c4";
// $password   =   "d813a978";
// $database   =   "heroku_6964a60fb425567";

//paste config mysql, jgn lupa dicomment
// mysql://b49de0cbf43168:ec33df86@us-cdbr-east-03.cleardb.com/heroku_8546be537c96d06?reconnect=true

$host       =   "us-cdbr-east-03.cleardb.com";
$user       =   "b49de0cbf43168";
$password   =   "ec33df86";
$database   =   "heroku_8546be537c96d06";

$conn = mysqli_connect($host, $user, $password, $database);