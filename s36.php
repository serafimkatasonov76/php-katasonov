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
    $symbols = array_reverse(str_split($_POST["text12"]));
    $before = mb_convert_case($_POST["before"], MB_CASE_LITTLE, "windows-1251");
    $after = mb_convert_case($_POST["after"], MB_CASE_LITTLE, "windows-1251");

    for($i = count($symbols) - 1; $i > 0; $i--) {
      if(mb_convert_case($symbols[$i], MB_CASE_LITTLE, "windows-1251") == $after && mb_convert_case($symbols[$i - 1], MB_CASE_LITTLE, "windows-1251") == $before) continue;
      echo $symbols[$i];
    }
    echo $symbols[0];
  }
  
  echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
  echo "<h2>15. ���� ������-�����������. ����������� ��, �������� ������� ��� �������,
		������������� �� ������ ������, � �����, � �������� �������, ��� �������,
		������������� �� �������� ������</h2>";
  echo "�����:<br><textarea type='text' name='text15' cols='30' rows='5'></textarea><br>";
  echo "<input type='submit' name='submit15' value='���������'></form>";

  if(isset($_POST["submit15"])) {
   $chet = array();
   $nechet = array();
   $chars = str_split($_POST["text15"]);
   for($i=0; $i<count($chars); $i++)
   {
	   if(($i+1)%2==0)
		   array_push($chet, $chars[$i]);
	   else
		   array_push($nechet, $chars[$i]);
   }
   $finalstr = "";
   for($i=0; $i<count($chet); $i++)
   {
	   $finalstr.=$chet[$i];
   }
   for($i=count($nechet)-1; $i>=0; $i--)
   {
	   $finalstr.=$nechet[$i];
   }
   
   echo "����: ".$finalstr." chet:".count($chet)." nechet:".count($nechet);
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
   $zaglav = 0;
   $stroch = 0;
   $chars = str_split($_POST["text18"]);
   for($i=0; $i<count($chars); $i++)
   {
	   if(ctype_upper($chars[$i]))
		   $zaglav++;
	   else
		   $stroch++;
   }
   $finalstr = "";
   if($zaglav<$stroch)
	   $finalstr = mb_strtolower($_POST["text18"]);
   else if($zaglav>$stroch)
	   $finalstr = mb_strtoupper($_POST["text18"]);
   else 
	   $finalstr = $_POST["text18"];

   
   echo "����: ".$finalstr." stroch:".$stroch." zaglav:".$zaglav;
  }

  
?>
</BODY>
</HTML>