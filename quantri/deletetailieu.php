<?php 
$delid = $_GET['id'];
require('../ketnoi/connect.php');
$sql_str = "delete from tailieu where id = $delid";
mysqli_query($conn,$sql_str);
header("location: listtailieu.php");
?>