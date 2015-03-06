
 <form action="<?php echo myUrl('main/adminMaterii'); ?>" method="POST">
            <div>
                <div class="login_text"> Va rugam introduceti noua materie </div>
                <br />
                <div>
                    <div class="col_grupa1">Numele Grupei</div>
                    <div class="col_grupa2"><input type="text" name="nume"/></div>

                </div>
          
                
                 <div style="clear:both;">
                    <div class="col_grupa1">Nume Materie</div>
                    <div class="col_grupa2"><input type="text" name="denumire"/></div>

                </div>
                 <div style="clear:both;">
                    <div class="col_grupa1">Credite</div>
                    <div class="col_grupa2"><input type="number" name="credite"/></div>

                </div>

                <div style="clear:both;">
                       <input type="hidden" name="actiune" value="add"/>
                    <div class="col_grupa1"><input type="submit" value="Trimite"/></div>
                    <div class="col_grupa2"><input type="reset" value="Reseteaza"/></div>

                </div>
                
            </div>
        </form>
