<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<HTML> 
	<HEAD>
        <TITLE>Katasonov</TITLE>
    </HEAD>
	<BODY>
<?php
  echo "<h1>��������� �.�.</h1><br>";
  
  echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
  echo "<h2>12. ������������� �������� ������������ ����� � ��� �������. ������������ �������� �����, ������ �� ���� ��� ��������� ������� �������, ��������������� ����� �������� ��������� ������ ������.</h2>";
  echo "�����:<br><textarea type='text' name='text12' cols='30' rows='5'></textarea><br>";
  echo "������ ������: <input type='text' name='before' size='5'><br>";
  echo "������ ������: <input type='text' name='after' size='5'><br>";
  echo "<input type='submit' name='submit12' value='���������'></form>";

  
  if(isset($_POST["submit12"])) {
    $symbols = str_split($_POST["text12"]);
    $before = strtolower($_POST["before"]);
    $after = strtolower($_POST["after"]);

    $symbols = array_reverse($symbols);
    echo $symbols[count($symbols) - 1];
    for($i = count($symbols) - 1; $i > 0; $i--) {
      if(strtolower($symbols[$i - 1]) == $after && strtolower($symbols[$i]) == $before) continue;
      echo $symbols[$i - 1];
    }
  }
  
  echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
  echo "<h2>15. ���� ������-�����������. ����������� ��, �������� ������� ��� �������,
		������������� �� ������ ������, � �����, � �������� �������, ��� �������,
		������������� �� �������� ������</h2>";
  echo "�����:<br><textarea type='text' name='text15' cols='30' rows='5'></textarea><br>";
  echo "<input type='submit' name='submit15' value='���������'></form>";

  if(isset($_POST["submit15"])) {
   
  }
  echo "<br><br><br>";
  
  echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
  echo "<h2>18. ��� �����. ����������, ����� ���� (�������� ��� ���������) � ��� ������, �
		������������ ��������� �������: ���� ������ ��������� ����, ��� ��������, �� ���
		����� ������������� � ���������; ���� ������ ��������, �� ��� �����
		������������� � ��������; ���� ������� � ��� � ������ � ����� �������� ���
		���������</h2>";
  echo "�����:<br><textarea type='text' name='text18' cols='30' rows='5'></textarea><br>";
  echo "<input type='submit' name='submit18' value='���������'></form>";
  if(isset($_POST["submit18"])) {
    $rus_upper = str_split("�������������������������������ި");
    $rus_lower = str_split("���������������������������������");
    $eng_upper = str_split("qwertyuiopasdfghjklzxcvbnm");
    $eng_lower = str_split("QWERTYUIOPASDFGHJKLZXCVBNM");

    $lower = $upper = 0;
    foreach(str_split($_POST["text"]) as $char)
      if(in_array($char, $rus_lower) || in_array($char, $eng_upper)) $lower++;
      elseif(in_array($char, $rus_upper) || in_array($char, $eng_lower)) $upper++;
  
    if($lower > $upper) echo mb_convert_case($_POST["text"], MB_CASE_LOWER, "windows-1251");
    elseif($upper > $lower) echo mb_convert_case($_POST["text"], MB_CASE_UPPER, "windows-1251");
    else echo $_POST["text"];
  }

  
?>
</BODY>
</HTML>