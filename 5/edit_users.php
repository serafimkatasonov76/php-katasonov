<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
 session_start();
 if($_SESSION["rule"] == 2) {
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
  $rows=mysqli_query($conn, "SELECT username, rule FROM users WHERE username='".$_GET['username']."'");
  while ($st = mysqli_fetch_array($rows)) {
   $username=$_GET["username"];
   $rule = $st['rule'];
  }
  echo "<html><head><title>�������������� ������</title></head><body>";
  echo "<H2>�������������� ������:</H2>";
  echo "<form action='save_edit_users.php' metod='get'>";
  echo "��� ������������: <input name='username' size='20' type='text' value='".$username."'>";
  echo "<br>������: <input name='password' size='20' type='password' value=''>";
  echo "<br>����� �������: <input name='rule' size='10' type='text' value='".$rule."'>";
  echo "<input type='submit' name='' value='���������'></form>";
  echo "<p><a href='.'> ��������� </a></body></html>";
 }
 else {
  header("Location: .");
 }
?>