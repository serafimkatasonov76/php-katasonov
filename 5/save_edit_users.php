<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
session_start();
if($_SESSION["rule"] != 2) header("Location: .");
?>

<html><body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
 $zapros="UPDATE users SET username='".$_GET['username']."', password='".md5($_GET['password'])."', rule='".$_GET['rule']."' WHERE username='".$_GET['old_username']."'";
 mysqli_query($conn, $zapros);
 if (mysqli_affected_rows($conn) > 0) {
  echo "��� ���������. <a href='.'> ��������� �� �������</a>";
 }
 else {
  echo "������ ����������. <a href='.'> ��������� �� ������� </a>";
 }
?>
</body></html>