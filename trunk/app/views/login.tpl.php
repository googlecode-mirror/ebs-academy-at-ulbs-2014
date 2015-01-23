<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body>


        <form action="check_login.php" method="POST">
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

                    <div class="recover"><a href="#"> Recover password</a></div>

                </div>
            </div>
        </form>


    </body>
</html>