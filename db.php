<?php
/* Database connection settings */
$host = "localhost";
$user = "root";
$pass = "";
$db = "theatredb";

try{
  $conn = mysqli_connect($host,$user,$pass,$db);

}catch(PDOException $e){
  die("Connection failed: " . $e->getMessage());
}
