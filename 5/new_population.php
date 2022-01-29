<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<?php
session_start();
if(!$_SESSION["rule"]) header("Location: .");
?>

<html>
<head> <title> Добавление новой записи </title> </head>
<body>
<?php
 $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("Невозможно подключиться к серверу");
 mysqli_query($conn, "SET NAMES cp1251");
?>
<H2>Добавление новой записи:</H2>
<form action="save_new_population.php" metod="get">

<?php
print "<br>id Планеты: <select name='id_planet'>";
$result=mysqli_query($conn, "SELECT * FROM planet");
echo "<option value='' selected hidden>...</option>";
foreach($result as $row) echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
echo "</select>";
?>

<?php
print "<br>id Вида инопланетян: <select name='id_alien'>";
$result=mysqli_query($conn, "SELECT * FROM alien");
echo "<option value='' selected hidden>...</option>";
foreach($result as $row) echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
echo "</select>";
?>

<br>Количество, тыс.: <input name="count" size="20" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p><a href="index.php"> Вернуться </a>
</body>
</html>