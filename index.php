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

<a href='./1/'>������������ ������ �1</a><br>
<a href='./2/'>������������ ������ �2</a><br>
<a href='./3/'>������������ ������ �3</a><br>
<a href='./4/'>������������ ������ �4</a><br>
<a href='./5/'>������������ ������ �5</a><br>

</body>

