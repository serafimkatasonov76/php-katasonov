<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head
<title> �������������� ������ </title>
</head>
<body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b374ee7921ac55","547aa47c", "heroku_1ad19f5ab79e862") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
 $rows=mysqli_query($conn, "SELECT * FROM service WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_array($rows)) {
 $name=$st["name"];
 $info = $st['info'];
 }
print "<form action='save_edit_service.php' metod='get'>";
print "��������: <input name='name' size='20' type='text'
value='".$name."'>";
print "<br>��������: <textarea name='info' rows='4' cols='40'>".$_GET['info']."</textarea>";
print "<input type='hidden' name='id' value='".$_GET['id']."'>";
print "<input type='submit' name='' value='���������'>";
print "</form>";
print "<p><a href=\"index.php\"> ��������� </a>";
?>
</body>
</html>