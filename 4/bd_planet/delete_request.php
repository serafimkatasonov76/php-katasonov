<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b374ee7921ac55","547aa47c", "heroku_1ad19f5ab79e862") or die ("���������� ������������ � �������");
 $zapros="DELETE FROM request WHERE id=" . $_GET['id'];
 mysqli_query($conn, $zapros);
 header("Location: index.php");
 exit;
?>