<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
 // ����������� � ���� ������:
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
 mysqli_query($conn, "SET NAMES cp1251"); // ��� ���������
 // ������ ������� �� ���������� ������ � �������:
 $sql_add = "INSERT INTO planet SET name='" . $_GET['name']
."', galaxy='".$_GET['galaxy']."', distance='"
.$_GET['distance']."', type='".$_GET['type'].
"', diam='".$_GET['diam']. "'";
 mysqli_query($conn, $sql_add); // ���������� �������
 if (mysqli_affected_rows($conn)>0) // ���� ��� ������ ��� ���������� �������
 { print "<p>������ ���������.";
 print "<p><a href=\"index.php\"> ��������� </a>"; }
 else { print "������ ����������. <a href=\"index.php\">
��������� </a>"; }
?>