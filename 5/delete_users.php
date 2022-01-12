<?php
 session_start();
 if($_SESSION["rule"] == 2) {
  $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("Невозможно подключиться к серверу");
  $zapros="DELETE FROM users WHERE username='" . $_GET['username']."'";
  mysqli_query($conn, $zapros);

  if($_GET['username'] == $_SESSION['username']) session_destroy();
 }
 header("Location: .");
?>