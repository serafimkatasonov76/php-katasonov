<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<HTML> 
	<HEAD>
        <TITLE>Katasonov</TITLE>
    </HEAD>
	<BODY>
<?php
  echo "<h1>Катасонов С.А.</h1><br>";
  
  echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
  echo "<h2>12. Пользователем задается произвольный текст и два символа. Перепечатать заданный текст, удалив из него все вхождения второго символа, непосредственно перед которыми находится первый символ.</h2>";
  echo "Текст:<br><textarea type='text' name='text12' cols='30' rows='5'></textarea><br>";
  echo "Первый символ: <input type='text' name='before' size='5'><br>";
  echo "Второй символ: <input type='text' name='after' size='5'><br>";
  echo "<input type='submit' name='submit12' value='Выполнить'></form>";

  
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
  echo "<h2>15. Дана строка-предложение. Зашифровать ее, поместив вначале все символы,
		расположенные на четных местах, а затем, в обратном порядке, все символы,
		расположенные на нечетных местах</h2>";
  echo "Текст:<br><textarea type='text' name='text15' cols='30' rows='5'></textarea><br>";
  echo "<input type='submit' name='submit15' value='Выполнить'></form>";

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
   
   echo "Итог: ".$finalstr." chet:".count($chet)." nechet:".count($nechet);
  }
  echo "<br><br><br>";
  
  echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
  echo "<h2>18. Дан текст. Определите, каких букв (строчных или прописных) в нем больше, и
		преобразуйте следующим образом: если больше прописных букв, чем строчных, то все
		буквы преобразуются в прописные; если больше строчных, то все буквы
		преобразуются в строчные; если поровну и тех и других — текст остается без
		изменения</h2>";
  echo "Текст:<br><textarea type='text' name='text18' cols='30' rows='5'></textarea><br>";
  echo "<input type='submit' name='submit18' value='Выполнить'></form>";
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

   
   echo "Итог: ".$finalstr." stroch:".$stroch." zaglav:".$zaglav;
  }

  
?>
</BODY>
</HTML>