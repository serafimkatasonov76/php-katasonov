<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head> <title> ���������� ������ ������������ </title> </head>
<body>
<H2>����������� �� �����:</H2>
<form action="save_new.php" metod="get">
 ���: <input name="name" size="50" type="text">
<br>�����: <input name="login" size="20" type="text">
<br>������: <input name="password" size="20" type="password">
<br>�-mail: <input name="e_mail" size="30" type="text">
<br>����������: <textarea name="info" rows="4" cols="40">
</textarea>
<p><input name="add" type="submit" value="��������">
<input name="b2" type="reset" value="��������"></p>
</form>
<p>
<a href="index.php"> ��������� � ������ ������������� </a>
</body>
</html>