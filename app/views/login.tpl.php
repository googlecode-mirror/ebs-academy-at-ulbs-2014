
        <form action="<?php echo myUrl('ops/check_login'); ?>" method="POST">
            <div class="login_div">
                <div class="login_text"> Va rugam introduceti datele de logare: </div>
                <br />
                <div>
                    <div class="col_login1">Email</div>
                    <div class="col_login2"><input type="email" name="email"/></div>

                </div>
                <div style="clear:both;">
                    <div class="col_login1">Password</div>
                    <div class="col_login2"><input type="password" name="password"/></div>

                </div>

                <div style="clear:both;">

                    <div class="col_login1"><input type="submit" value="Trimite"/></div>
                    <div class="col_login2"><input type="reset" value="Reseteaza"/></div>

                </div>
                <div style="clear:both;">

                    <div class="recover"><a href="<?php echo myUrl('main/recover'); ?>"> Recover password</a></div>

                </div>
            </div>
        </form>

