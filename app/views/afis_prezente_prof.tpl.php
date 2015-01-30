
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script>
            function checkAll(bx) {
                var cbs = document.getElementsByTagName('input');
                for (var i = 0; i < cbs.length; i++) {
                    if (cbs[i].type == 'checkbox') {
                        cbs[i].checked = bx.checked;
                    }
                }
            }
        </script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Prezente</title>


    </head>

    <body>

        <?php
        include 'connect.php';
        $sql = "
        SELECT `prezenta`.`ID`, `materii`.`DENUMIRE`, `prezenta`.`DATA`, `prezenta`.`TIP_PREZENTA`
        FROM ulbsplatform.prezenta_user, ulbsplatform.prezenta, ulbsplatform.materii
        WHERE `prezenta`.`ID` = `prezenta_user`.`ID_PREZENTA`
                and `materii`.`ID` = `prezenta`.`ID_MATERIE`
                and `prezenta_user`.`ID_USER`=1"; //trebuie pus id-ul userului din sesiune
        ?>
        <form action="script_prezente.tpl.php" method="POST">
            <div>
                <div class="afis_checkbox"> </div>
                <div class="crt"> Nr Crt. </div>
                <div class="mat"> Nume Materie </div>
                <div class="prezenta"> Prezenta </div>
                <div class="data"> Data </div>
                <div class="sterge"> Sterge </div>
                <div class="modifica"> Modifica </div>

            </div>






<?php
$result = $conn->query($sql);
$i = 1;
while ($row = mysqli_fetch_array($result)) {
    $originalDate = $row["DATA"];
    $newDate = date("d-m-Y", strtotime($originalDate));
    echo '<div style="clear:both;">
            <div class="afis_checkbox"> <input type="checkbox" name="' . $row["ID"] . '"/></div>
            <div class="crt">' . $i . '</div>
            <div class="mat">' . $row["DENUMIRE"] . '</div>
            <div class="prezenta">' . $row["TIP_PREZENTA"] . '</div>
            <div class="data">' . $newDate . '</div>
            <div class="sterge"><input type="submit" name="sterge"  value="Sterge"/></div>
            <div class="modifica"><input type="submit" name="modifica"  value="Modifica"/></div>
            </div>
            
';

    $i++;
}
$conn->close();
?>
            <div style="clear:both;">
                <div class="afis_checkbox"><input type="checkbox"  onclick="checkAll(this)"/>Select all  </div>
                <div class="crt"> </div>
                <div class="mat">  </div>
                <div class="prezenta"></div>
                <div class="data"> </div>
                <div class="sterge"> <input type="submit" name="sterge"  value="Delete all"/></div>
                <div class="modifica"> <input type="submit" name="modifica"  value="Update all"/> </div>
            </div>

        </form>


    </body>
</html>