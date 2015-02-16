
<form action="<?php echo myUrl('ops/add_new_password') ?>" method="POST" onsubmit="return checkPassSubmit();">
    <div class="login_div">
        <div class="login_text"> Va rugam introduceti noua parola </div>
        <br />
        <div>
            <div class="col_login1">Password</div>
            <div class="col_login2"><input type="password" name="password1" id="pass1"/></div>
            
        </div>
        <div style="clear:both;">
            <div class="col_login1"> Re-enter Password</div>
            <div class="col_login2"><input type="password" name="password2" id="pass2" onkeyup="checkPass();
                            return false;"/></div>

        </div>

        <div style="clear:both;">
            <br />
            <input type="hidden" name="id" 
			value="<?php echo isset($user['ID']) ? $user['ID'] : '';?>" />
            <div class="col_login1"><input type="submit" value="Trimite" /></div>
            <div class="col_login2"><input type="reset" value="Reseteaza"/></div>

        </div>

    </div>
</form>

