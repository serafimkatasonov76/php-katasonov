<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head>
<title> �������������� ������ </title>
</head>
<body>
<?php
 date_default_timezone_set("Asia/Yekaterinburg");

 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
 $rows=mysqli_query($conn, "SELECT * FROM population WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_array($rows)) {
 $id_planet=$st["id_planet"];
 $id_alien=$st["id_alien"];
 $count=$st["count"];
 }

print "<br>id �������: <select name='id_planet'>";
$result=mysqli_query($conn, "SELECT * FROM planet");
foreach($result as $row) {
  if($row["id"] == $id_planet) echo "<option value='".$row["id"]."' selected>".$row["name"]."</option>";
  else echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
  }
echo "</select>";

print "<br>id ���� �����������: <select name='id_alien'>";
$result=mysqli_query($conn, "SELECT * FROM alien");
foreach($result as $row) {
  if($row["id"] == $id_alien) echo "<option value='".$row["id"]."' selected>".$row["name"]."</option>";
  else echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
  }
echo "</select>";

print "<br>����������, ���.: <input name='count' size='20' type='text'
value='".$count."'>";
print "<input type='hidden' name='id' value='".$_GET['id']."'>";
print "<input type='submit' name='' value='���������'>";
print "</form>";
print "<p><a href=\"index.php\"> ��������� </a>";
?>
</body>
</html>