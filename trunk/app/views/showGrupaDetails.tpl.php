Grupa
<?php echo $nume ?>
<div>

    <div class="crt"> Nr Crt. </div>
    <div class="mat"> Numele Studentului </div>

    <?php
    $i = 1;
    $max = count($users);
    for ($key_Number = 0; $key_Number < $max; $key_Number++) {
        echo '<div style="clear:both;">
	<div class="crt">' . $i . '</div>
	<div class="mat">' . $users[$key_Number]['NUME'] . ' ' . $users[$key_Number]['PRENUME'] . '</div>
	
        </div>';
        $i++;
    }
    ?>


</div>