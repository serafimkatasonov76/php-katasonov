<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
 session_start();
 if($_SESSION["rule"] == 2) {
  $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b374ee7921ac55","547aa47c", "heroku_1ad19f5ab79e862") or die ("���������� ������������ � �������");
  mysqli_query($conn, 'SET NAMES cp1251');
  $sql_add = "INSERT INTO users SET username='" . $_GET['username']."', password='".md5($_GET['password'])."', rule='".$_GET['rule']. "'";
  mysqli_query($conn, $sql_add);
  if (mysqli_affected_rows($conn)>0) { // ���� ��� ������ ��� ���������� �������
   echo "������ ���������.<br>";
   echo "<a href='.'>��������� </a>";
  }
  else {
   echo "������ ����������. <a href='.'>��������� </a>";
  }
 }
 else {
  header("Location: .");
 }
?>