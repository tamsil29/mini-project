<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>sign up</title>
        <link rel="stylesheet" href="style1.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="index1.php" style="text-decoration: none;">
        <div class="headband">
            <h1>picturesque</h1>
            <p class="moto">A PHOTOGRAPHY JOURNAL</p>
        </div></a><br><br>
        <div style="text-align: center;">
            <h2 style="color: black; font-size: 30px;">Sign up!</h1>
        </div>
        <div class="bbox">
            <form action="includes/signup.inc.php" method="POST" style="padding: 30px;">

            <input type="text" name="name" id="userid" placeholder="Name" class="userid"  autofocus required autocomplete="on"><br><br>

            <input type="email" name="mail" id="userid" placeholder="E-mail" class="userid"  required autocomplete="on"><br><br>

            <input type="text" name="cuserid" id="userid" placeholder="Create UserId" class="userid"  required autocomplete="on"><br><br>

            <input type="password" name="cpswrd" id="pswrd" placeholder="Create Password" class="userid" required><br><br>

            <button type="submit" name="sign-up" class="signb" style="padding-left: 70px; padding-right: 70px;padding-top: 8px;padding-bottom: 8px; color: white; background-color: red;border: 0px;">Sign up</button>
            </form>
        </div><br><br>
        <div style="text-align: center;"><form action="ulogin.php" method="POST" style="padding: 30px;"><button class="signb2" type="submit" name="signin">Already have an account?</button></form>
        </div>
    </body>
</html>
