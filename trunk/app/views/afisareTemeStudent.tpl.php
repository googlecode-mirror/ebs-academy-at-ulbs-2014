<div id="afisare_user">
    <table id="tabel">
        <form method="post" action="<?php echo myUrl('teme/#') ?>" >
    
            <tr>
                <th>Denumire</th>
                <th>Profesor</th>
                <th>Materie</th>  
            </tr>
            
            <?php
            $lengthOfArray = count($tema);
            for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                echo 
                "<tr>
                    <td><Input type = 'radio' name ='radioButton' >" . $tema[$key_Number]['DENUMIRE'] . "</td>
                    <td>" . $tema[$key_Number]['NUME'] . ' ' . $tema[$key_Number]['PRENUME'] . "</td>
                    <td>" . $tema[$key_Number]['MATERIE'] . "</td>
                </tr>";
            }
            ?>

            <tr>
                <th><input type="submit" name="vreauTema" value="Vreau tema!" ></div></th>
                <th></th>
                <th></th>  
            </tr>
            
        </form>
    </table>
</div>