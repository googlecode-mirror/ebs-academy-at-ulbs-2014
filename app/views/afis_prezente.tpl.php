<div>

    <?php
    $prezenta[0][0] = "ebs";
    $prezenta[0][1] = "p";
    $prezenta[0][2] = "23-11-2014";
    $prezenta[1][0] = "ebs";
    $prezenta[1][1] = "p";
    $prezenta[1][2] = "27-11-2014";
    $prezenta[2][0] = "ebs";
    $prezenta[2][1] = "p";
    $prezenta[2][2] = "23-01-2015";
    ?>

    <div>

        <div class="crt"> Nr Crt. </div>
        <div class="mat"> Nume Materie </div>
        <div class="prezenta"> Prezenta </div>
        <div class="data"> Data </div>


    </div>

    <?php
    $i = 1;
    for ($key_Number = 0; $key_Number <= 2; $key_Number++) {
        echo '<div style="clear:both;">
	<div class="crt">' . $i . '</div>
	<div class="mat">' . $prezenta[$key_Number][0] . '</div>
	<div class="prezenta">' . $prezenta[$key_Number][1] . '</div>
	<div class="data">' . $prezenta[$key_Number][2] . '</div>
        </div>
				';

        $i++;
    }
    ?>
</div>

