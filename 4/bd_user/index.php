<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head> <title> �������� � �������������� ����� </title> </head>
<body>
<?php
 
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
?>
<h2>������������������ ������������:</h2>
<table border="1">
<tr>
 <th> ��� </th> <th> E-mail </th>
 <th> ������������� </th> <th> ���������� </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT id_user, user_name, user_e_mail
FROM user"); // ������ �� ������� �������� � �������������
while ($row=mysqli_fetch_array($result)){// ��� ������ ������ �� �������
 echo "<tr>";
 echo "<td>" . $row['user_name'] . "</td>";
 echo "<td>" . $row['user_e_mail'] . "</td>";
 echo "<td><a href='edit.php?id_user=" . $row['id_user']
. "'>�������������</a></td>"; // ������ ������� ��� ��������������
 echo "<td><a href='delete.php?id_user=" . $row['id_user']
. "'>�������</a></td>"; // ������ ������� ��� �������� ������
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // ����� ������� � ������� ��
print("<P>����� �������������: $num_rows </p>");
?>
<p> <a href="new.php"> �������� ������������ </a>

<br><br><a href='..'>�����</a><br>
</body> </html>
