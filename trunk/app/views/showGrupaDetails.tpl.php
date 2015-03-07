<div id="afisare_user">
    <table id="tabel">
        <form method="POST" action="<?php echo myUrl('administrare/deleteGrupaMember'); ?>" >
            <tr>
                <th>Grupa <?php echo $nume ?></th>
                <th><a href="<?php echo myUrl('administrare/addGrupaUsers/').$id ?>">Adauga membru </a></th>
                <th></th>
            <tr>
                
            <tr>
                <th>Nr Crt.</th>
                <th>Numele Studentului</th>
                <th>Sterge</th>
            </tr>
            
            <?php
            $lengthOfArray = count($users);
            for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                echo 
                "<tr>
                    <td><input type=\"checkbox\" name=\"checkbox_" . $users[$key_Number]['IDGrupaUsers'] . "\" value=\"id_" . $users[$key_Number]['IDGrupaUsers'] . "\"></td>
                    <td>" . $users[$key_Number]['NUME'] . ' ' . $users[$key_Number]['PRENUME'] . "</td>
                    <td><input type=\"submit\" value=\"Sterge\" ></td>
                </tr>";
            }
            ?>
        </form>
    </table>
</div>