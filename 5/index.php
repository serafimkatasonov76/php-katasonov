<?php header('Content-Type: text/html; charset=windows-1251'); ?>

<html>
<body>

<?php
  session_start();

  $conn = mysqli_connect("eu-cdbr-west-02.cleardb.net","b844245c408b92","a1683317", "heroku_1f01e7efa26acd8") or die ("���������� ������������ � �������");
  mysqli_query($conn, "SET NAMES cp1251");

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $query=mysqli_query($conn, "SELECT * FROM users WHERE username='".$_POST["username"]."' AND password='".md5($_POST["password"])."'");
    if($fetch = mysqli_fetch_array($query)) {
      $_SESSION["username"] = $fetch["username"];
      $_SESSION["rule"] = $fetch["rule"];
      if(!$_SESSION["count"]) $_SESSION["count"] = 0;
    }
    else {
      echo "<html><head><title>�����������</title></head><body>";
      echo "�������� ��� ������������ ��� ������!<br>";
      echo "<br><a href='.'> ��������� </a>";
    }
  }
  elseif(!$_SESSION["username"]) { 
    echo "<html><head><title>�����������</title></head><body>";
    echo "<h1>��������� �. �.</h1>";
    echo "<form method='post' action='". $PHP_SELF ."'>";
    echo "<p>������������:</p><input type='text' name='username' size='16'>";
    echo "<p>������:</p><input type='password' name='password' size='16'><br><br>";
    echo "<input type='submit' name='submit' value='�����'></form>";
    echo "<br><a href='..'>�����</a><br>";
  }
  
  if($_SESSION["username"]) {
    $query=mysqli_query($conn, "SELECT rule FROM users WHERE username='" . $_SESSION["username"] . "'");
    if($fetch = mysqli_fetch_array($query)) $_SESSION["rule"] = $fetch["rule"];

    echo "<html><head><title>���� ������</title></head><body>";
    echo "<h2>�������:</h2>";
    echo "<table border='1'>";
    echo "<tr><th> id </th>";
    echo "<th> �������� </th> <th> ��������� </th>";
    echo "<th> ����������, ���. ��. </th> <th> ��� </th> <th> �������, ��. </th>";
    echo "<th> ������������� </th>";
    if($_SESSION["rule"] == 2) echo "<th>����������</th>";
    echo "</tr>";
    $result=mysqli_query($conn, "SELECT * FROM planet");
    while ($row=mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["galaxy"] . "</td>";
      echo "<td>" . $row["distance"] . "</td>";
      echo "<td>" . $row["type"] . "</td>";
      echo "<td>" . $row["diam"] . "</td>";
      echo "<td><a href='edit_olanet.php?id=" . $row["id"]
      . "'>�������������</a></td>";
      if($_SESSION["rule"] == 2) echo "<td><a href='delete_planet.php?id=" . $row["id"]
      . "'>�������</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    $num_rows = mysqli_num_rows($result);
    echo "<p> ����� �������: $num_rows </p>";
    echo "<a href='new_planet.php'> �������� ������ </a><br><br>";

    echo "<h2>���� �����������:</h2>";
    echo "<table border='1'>";
    echo "<tr><th> id </th>";
    echo "<th> �������� </th> <th> �������� </th>";
    echo "<th> ������������� </th>";
    if($_SESSION["rule"] == 2) echo "<th> ���������� </th></tr>";
    $result=mysqli_query($conn, "SELECT * FROM alien");
    while ($row=mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["info"] . "</td>";
      echo "<td><a href='edit_alien.php?id=" . $row["id"]
      . "'>�������������</a></td>";
      if($_SESSION["rule"] == 2) echo "<td><a href='delete_alien.php?id=" . $row["id"]
      . "'>�������</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    $num_rows = mysqli_num_rows($result);
    echo "<p> ����� �������: $num_rows </p>";
    echo "<a href='new_alien.php'> �������� ������ </a><br><br>";

    echo "<h2>������������������ ���������:</h2>";
    echo "<table border='1'>";
    echo "<tr><th> id </th>";
    echo "<th> id ������� </th> <th> id ���� ����������� </th> <th> ����������, ���. </th>";
    echo "<th> ������������� </th>";
    if($_SESSION["rule"] == 2) echo "<th> ���������� </th> </tr>";
    $result=mysqli_query($conn, "SELECT * FROM population");
    while ($row=mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["id_planet"] . "</td>";
      echo "<td>" . $row["id_alien"] . "</td>";
      echo "<td>" . $row["count"] . "</td>";
      echo "<td><a href='edit_population.php?id=" . $row["id"]
      . "'>�������������</a></td>";
      if($_SESSION["rule"] == 2) echo "<td><a href='delete_population.php?id=" . $row["id"]
      . "'>�������</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    $num_rows = mysqli_num_rows($result);
    echo "<p> ����� �������: $num_rows </p>";
    echo "<a href='new_population.php'> �������� ������ </a><br><br>";

    if($_SESSION["rule"] == 2) {
      echo "<h2>������������:</h2>";
      echo "<table border='1'>";
      echo "<tr><th>��� ������������</th><th>������</th><th>����� �������</th>";
      echo "<th>�������������</th><th>����������</th></tr>";
      $query=mysqli_query($conn, "SELECT * FROM users");
      while($fetch=mysqli_fetch_array($query)) {
        echo "<tr><td>" . $fetch["username"] . "</td>";
        echo "<td>" . $fetch["password"] . "</td>";
        echo "<td>" . $fetch["rule"] . "</td>";
        echo "<td><a href='edit_users.php?username=" . $fetch["username"] . "'>�������������</a></td>";
        echo "<td><a href='delete_users.php?username=" . $fetch["username"]. "'>�������</a></td></tr>";
      } 
      echo "</table>";
   
      $num_rows = mysqli_num_rows($query);
      echo "<p> ����� �������: $num_rows </p>";
      echo "<a href='new_users.php'>�������� ������</a><br><br>";
    }

    echo "<br><a href='gen_pdf.php'> ��������� PDF </a><br>";
    echo "<a href='gen_xls.php'> ��������� Excel </a><br>";

    $_SESSION["count"]++;
    echo "<br>����������� �� ������: " . $_SESSION["count"];
    echo "<br><a href='exit.php'>�����</a><br>";

    echo "<br><a href='..'>�����</a><br>";

    echo "</body></html>";
 }
?>