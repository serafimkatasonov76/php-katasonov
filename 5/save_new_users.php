<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
 session_start();
 if($_SESSION["rule"] == 2) {
  $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
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