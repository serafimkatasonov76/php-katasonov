<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head
<title> �������������� ������ � ������������ </title>
</head>
<body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
 $rows=mysqli_query($conn, "SELECT user_name, user_login,
user_password, user_e_mail, user_info FROM user WHERE
id_user=".$_GET['id_user']);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id_user'];
 $name = $st['user_name'];
 $login = $st['user_login'];
 $password = $st['user_password'];
 $e_mail = $st['user_e_mail'];
 $info = $st['user_info'];
 }
print "<form action='save_edit.php' metod='get'>";
print "���: <input name='name' size='50' type='text'
value='".$name."'>";
print "<br>�����: <input name='login' size='20' type='text'
value='".$login."'>";
print "<br>������: <input name='password' size='20' type='text'
value='".$password."'>";
print "<br>�-mail: <input name='e_mail' size='30' type='text'
value='".$e_mail."'>";
print "<br>����������:<br><textarea name='info' rows='4'
cols='40'>".$info."</textarea>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='���������'>";
print "</form>";
print "<p><a href=\"index.php\"> ��������� � ������
������������� </a>";
?>
</body>
</html>