
<div id="noutati">
    <?php
    $lengthOfArray = count($noutate);
    for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {

        echo '<div class="noutati_box">
                    <div class="noutati_box1">
                    <div class="noutati_col1">' . $noutate[$key_Number]['AUTOR'] . '</div>
                    <div class="noutati_col2">' . $noutate[$key_Number]['DATA'] . '</div>
                    </div>
                    <div id="noutati_text">' . $noutate[$key_Number]['MESAJ'] . '</div>
                    

                </div>';
    }
    ?>
</div>
