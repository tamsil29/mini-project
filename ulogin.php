<?php
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Sign in</title>
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
          <h2 style="color: black; font-size: 30px;">Sign in!</h1>
      </div>
        <div class="bbox">
            <form action="includes/login.inc.php" method="POST" style="padding: 30px;">

            <input type="text" name="userid" id="userid" placeholder="UserId" class="userid" style="font-size: 15px; border: solid 1px  ;padding-top: 8px;padding-bottom: 8px; outline-color: red;" autofocus required autocomplete="on"><br><br>

            <input type="password" name="pswrd" id="pswrd" placeholder="Password" class="pswrd" style="font-size: 15px; border: solid 1px ;padding-top: 8px;padding-bottom: 8px;outline-color: red;" required><br><br>

            <button type="submit" name="sign-in" class="signb" style="padding-left: 73px; padding-right: 73px;padding-top: 8px;padding-bottom: 8px; color: white; background-color: red;border: 0px;">Sign In</button>
            </form>
        </div><br><br>
        <div style="text-align: center;"><form action="signupform.php" method="POST" style="padding: 30px;"><button class="signb2" type="submit" name="signup">Create an account!</button></form>
        </div>
    </body>
</html>
