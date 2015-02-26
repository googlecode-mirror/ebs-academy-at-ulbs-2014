<form action="<?php echo myUrl('ops/newUser') ?>" method="POST" onsubmit="return checkPassSubmit();">
    <div class="login_div">
        <div class="login_text"> Va rugam introduceti datele dumneavoastra! </div>
        <br />
        
        <div>
            <div class="col_login1">Email</div>
            <div class="col_login2"><input type="email" name="email" required="required" /></div>
        </div>
        
        <div>
            <div class="col_login1">Nume</div>
            <div class="col_login2"><input type="text" required="required" name="nume" /></div>
        </div>
        
        <div>
            <div class="col_login1">Prenume</div>
            <div class="col_login2"><input type="text" required="required" name="prenume" /></div>
        </div>
        
        <div>
            <div class="col_login1">Password</div>
            <div class="col_login2"><input type="password" required="required" name="password1" id="pass1"/></div>
        </div>
        
        <div style="clear:both;">
            <div class="col_login1"> Re-enter Password</div>
            <div class="col_login2"><input type="password" required="required" name="password2" id="pass2" onkeyup="checkPass();
                            return false;"/></div>
        </div>

        <div style="clear:both;">
            <br />
            <div class="g-recaptcha" data-sitekey="6Le0WQITAAAAACNfglWRATe3peeP3Q6MPUO34a-s"></div>
            <div class="col_login1"><input type="submit" value="Trimite" /></div>
            <div class="col_login2"><input type="reset" value="Reseteaza"/></div>
        </div>

    </div>
</form>