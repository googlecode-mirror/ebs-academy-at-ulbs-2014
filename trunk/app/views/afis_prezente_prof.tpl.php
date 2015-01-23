
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
        
        
        
        $prezenta = array
            (
            array('id' => 1,
                'mat' => 'ebs',
                'prez' => 'p',
                'data' => '24-11-2014'),
            array('id' => 2,
                'mat' => 'ebs',
                'prez' => 'p',
                'data' => '27-11-2014'),
            array('id' => 3,
                'mat' => 'ebs',
                'prez' => 'p',
                'data' => '28-11-2014')
        );
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

            <div style="clear:both;">
                <div class="afis_checkbox"><input type="checkbox"  onclick="checkAll(this)"/>Select all  </div>
                <div class="crt"> </div>
                <div class="mat">  </div>
                <div class="prezenta"></div>
                <div class="data"> </div>
                <div class="sterge"> </div>
                <div class="modifica">  </div>
            </div>

<?php
$i = 1;
for ($key_Number = 0; $key_Number < count($prezenta); $key_Number++) {
    echo '<div style="clear:both;">
            <div class="afis_checkbox"> <input type="checkbox" name="' . $prezenta[$key_Number]['id'] . '"/></div>
            <div class="crt">' . $i . '</div>
            <div class="mat">' . $prezenta[$key_Number]['mat'] . '</div>
            <div class="prezenta">' . $prezenta[$key_Number]['prez'] . '</div>
            <div class="data">' . $prezenta[$key_Number]['data'] . '</div>
            <div class="sterge"><input type="submit" name="sterge"  value="Sterge"/></div>
            <div class="modifica"><input type="submit" name="modifica"  value="Modifica"/></div>
	</div>
				';

    $i++;
}
?>

            </div>
        </form>


    </body>
</html>