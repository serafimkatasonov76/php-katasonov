<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html><body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
 mysqli_query($conn, 'SET NAMES cp1251');
 $zapros="UPDATE user SET user_name='".$_GET['name'].
"', user_login='".$_GET['login']."', user_password='"
.$_GET['password']."', user_e_mail='".$_GET['e_mail'].
"', user_info='".$_GET['info']."' WHERE id_user="
.$_GET['id'];
 mysqli_query($conn, $zapros);
if (mysqli_affected_rows($conn)>0) {
 echo '��� ���������. <a href="index.php"> ��������� � ������
������������� </a>'; }
 else { echo '������ ����������. <a href="index.php">
��������� � ������ �������������</a> '; }
?>
</body></html>