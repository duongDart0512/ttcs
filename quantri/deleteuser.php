<?php 
$delid = $_GET['id'];
require('../ketnoi/connect.php');
$sql_str = "delete from user where userid = $delid";
mysqli_query($conn,$sql_str);
header("location: listnguoidung.php");
?>