<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("Невозможно подключиться к серверу");
 $zapros="DELETE FROM user WHERE id_user=" . $_GET['id_user'];
 mysqli_query($conn, $zapros);
 header("Location: index.php");
 exit;
?>