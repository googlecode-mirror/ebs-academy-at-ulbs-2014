
 <form action="<?php echo myUrl('main/adminGrupa'); ?>" method="POST">
            <div>
                <div class="login_text"> Va rugam introduceti noua grupa </div>
                <br />
                <div>
                    <div class="col_grupa1">Numele Grupei</div>
                    <div class="col_grupa2"><input type="text" name="nume"/></div>

                </div>
          
                
                 <div style="clear:both;">
                    <div class="col_grupa1">Anul</div>
                    <div class="col_grupa2"><input type="number" name="an" min="1" max="6"/></div>

                </div>
                 <div style="clear:both;">
                    <div class="col_grupa1">Profil</div>
                    <div class="col_grupa2"><input type="text" name="profil"/></div>

                </div>

                <div style="clear:both;">
                       <input type="hidden" name="actiune" value="add"/>
                    <div class="col_grupa1"><input type="submit" value="Trimite"/></div>
                    <div class="col_grupa2"><input type="reset" value="Reseteaza"/></div>

                </div>
                
            </div>
        </form>
