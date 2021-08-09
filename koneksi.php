<?php
$hostname='us-cdbr-east-04.cleardb.com';
$username='b06e4d78cc70c5';
$password='e92d0a86';
$dbname='heroku_61847ab65c6aed4';


mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
?>
