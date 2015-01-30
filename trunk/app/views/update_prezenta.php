<?php

session_start();
include 'connect.php';
$id_prez = $_POST['id'];
$data = $_POST['data'];
$tip_prezenta = $_POST['tip_prezenta'];

$sql = "UPDATE `ulbsplatform`.`prezenta` SET 
        `DATA`='$data', 
        `TIP_PREZENTA`='$tip_prezenta'
        WHERE `ID`=$id_prez";

echo $sql;


if ($conn->query($sql) === TRUE) {
    header("Location:modify.php");
} else {

    unset($_SESSION['prezenta']);
    header("Location:afis_prezente_prof.tpl.php");
}
?>

