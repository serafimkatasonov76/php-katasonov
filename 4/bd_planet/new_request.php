<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<head> <title> ���������� ����� ������ </title> </head>
<body>
<H2>���������� ����� ������:</H2>
<form action="save_new_request.php" metod="get">
<br>���� ������: <input name="date_in" size="20" type="date">
<br>���� ���������: <input name="date_out" size="20" type="date">
<br>id ������������: <input name="id_fridge" size="20" type="text">
<br>id ���������� ������: <input name="id_service" size="20" type="text">
<br>���: <input name="fio" size="20" type="text">
<br>���������, ���.: <input name="price" size="20" type="text">
<p><input name="add" type="submit" value="��������">
<input name="b2" type="reset" value="��������"></p>
</form>
<p><a href="index.php"> ��������� </a>
</body>
</html>