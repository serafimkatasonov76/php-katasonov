<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
 mysqli_query($conn, "SET NAMES cp1251");
?>
<h2>�������:</h2>
<table border="1">
<tr>
 <th> id </th>
 <th> �������� </th> <th> ��������� </th>
 <th> ����������, ���. ��. </th> <th> ��� </th> <th> �������, ��. </th>
 <th> ������������� </th> <th> ���������� </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM planet"); // ������ �� ������� �������� � �������������
while ($row=mysqli_fetch_array($result)){// ��� ������ ������ �� �������
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["name"] . "</td>";
 echo "<td>" . $row["galaxy"] . "</td>";
 echo "<td>" . $row["distance"] . "</td>";
 echo "<td>" . $row["type"] . "</td>";
 echo "<td>" . $row["diam"] . "</td>";
 echo "<td><a href='edit_planet.php?id=" . $row["id"]
. "'>�������������</a></td>"; // ������ ������� ��� ��������������
 echo "<td><a href='delete_planet.php?id=" . $row["id"]
. "'>�������</a></td>"; // ������ ������� ��� �������� ������
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // ����� ������� � ������� ��
print("<P>����� �������: $num_rows </p>");
?>
<a href="new_planet.php"> �������� ������ </a><br><br>

<h2>���� �����������:</h2>
<table border='1''>
<tr>
 <th> id </th>
 <th> �������� </th> <th> �������� </th>
 <th> ������������� </th> <th> ���������� </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM alien"); // ������ �� ������� �������� � �������������
while ($row=mysqli_fetch_array($result)){// ��� ������ ������ �� �������
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["name"] . "</td>";
 echo "<td>" . $row["info"] . "</td>";
 echo "<td><a href='edit_alien.php?id=" . $row["id"]
. "'>�������������</a></td>"; // ������ ������� ��� ��������������
 echo "<td><a href='delete_alien.php?id=" . $row["id"]
. "'>�������</a></td>"; // ������ ������� ��� �������� ������
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // ����� ������� � ������� ��
print("<P>����� �������: $num_rows </p>");
?>
<a href="new_alien.php"> �������� ������ </a><br><br>

<h2>������������������ ��������� :</h2>
<table border='1''>
<tr>
 <th> id </th>
 <th> id ������� </th> <th> id ���� ����������� </th> <th> ����������, ���. </th>
 <th> ���� ����������� </th> <th> ����� ����������� </th>
 <th> ������������� </th> <th> ���������� </th> </tr>
<?php
$result=mysqli_query($conn, "SELECT * FROM population"); // ������ �� ������� �������� � �������������
while ($row=mysqli_fetch_array($result)){// ��� ������ ������ �� �������
 echo "<tr>";
 echo "<td>" . $row["id"] . "</td>";
 echo "<td>" . $row["id_planet"] . "</td>";
 echo "<td>" . $row["id_alien"] . "</td>";
 echo "<td>" . $row["count"] . "</td>";
 echo "<td>" . date("d.m.Y", strtotime($row["date"])) . "</td>";
 echo "<td>" . date("H:i:s", strtotime($row["date"])) . "</td>";
 echo "<td><a href='edit_population.php?id=" . $row["id"]
. "'>�������������</a></td>"; // ������ ������� ��� ��������������
 echo "<td><a href='delete_population.php?id=" . $row["id"]
. "'>�������</a></td>"; // ������ ������� ��� �������� ������
 echo "</tr>";
}
echo "</table>";
$num_rows = mysqli_num_rows($result); // ����� ������� � ������� ��
print("<P>����� �������: $num_rows </p>");
?>
<a href="new_population.php"> �������� ������ </a><br><br>

<a href="gen_pdf.php"> ��������� PDF </a><br>
<a href="gen_xls.php"> ��������� Excel </a><br>

<br><a href='..'>�����</a><br>

</body> </html>
