<?php
 session_start();
 if($_SESSION["rule"] == 2) {
  $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b374ee7921ac55","547aa47c", "heroku_1ad19f5ab79e862") or die ("Невозможно подключиться к серверу");
  $zapros="DELETE FROM users WHERE username='" . $_GET['username']."'";
  mysqli_query($conn, $zapros);

  if($_GET['username'] == $_SESSION['username']) session_destroy();
 }
 header("Location: .");
?>