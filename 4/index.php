<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<body>
<h1> ����� �. �. </h1>
<p> ���� � �����:

<?php
        date_default_timezone_set("Asia/Yekaterinburg");
	$d=date("d.m.Y H:i");
	
	echo($d);
?>
<br><br>

<a href='./bd_user/'>����� ������� (������������)</a><br>
<a href='./bd_fridge/'>������� �6 (������������)</a><br>

<br><a href='..'>�����</a><br>


