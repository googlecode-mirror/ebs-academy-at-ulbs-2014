<?php

include 'connect.php';
$sql = "select NUME,PRENUME,TIP from user where id=1"; // TREBUIE PUS ID=UL USERULUI DIN SESIUNE
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
echo 'WELCOME ' . strtoupper($row["TIP"]) . ' ' . $row["NUME"] . '  ' . $row["PRENUME"];
$conn->close();
?>