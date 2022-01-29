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
  echo "<h2>15. Дана строка-предложение. Зашифровать ее, поместив вначале все символы,
		расположенные на четных местах, а затем, в обратном порядке, все символы,
		расположенные на нечетных местах</h2>";
  echo "Текст:<br><textarea type='text' name='text15' cols='30' rows='5'></textarea><br>";
  echo "<input type='submit' name='submit15' value='Выполнить'></form>";

  if(isset($_POST["submit15"])) {
   $chars = str_split($_POST["text15"]);
   for($i = 0; $i < count($chars); $i++) if(($i + 1) % 2 == 0) echo $chars[$i];
   for($i = count($chars) - 1; $i >= 0; $i++) if(($i + 1) % 2 == 1) echo $chars[$i];
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
    $rus_upper = str_split("ЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ");
    $rus_lower = str_split("йцукенгшщзхъфывапролджэячсмитьбюё");
    $eng_upper = str_split("qwertyuiopasdfghjklzxcvbnm");
    $eng_lower = str_split("QWERTYUIOPASDFGHJKLZXCVBNM");

    $lower = $upper = 0;
    foreach(str_split($_POST["text18"]) as $char)
      if(in_array($char, $rus_lower) || in_array($char, $eng_upper)) $lower++;
      elseif(in_array($char, $rus_upper) || in_array($char, $eng_lower)) $upper++;
  
    if($lower > $upper) echo mb_convert_case($_POST["text18"], MB_CASE_LOWER, "windows-1251");
    elseif($upper > $lower) echo mb_convert_case($_POST["text18"], MB_CASE_UPPER, "windows-1251");
    else echo $_POST["text18"];
  }

  
?>
</BODY>
</HTML>