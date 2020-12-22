<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>upload files</title>
        <link rel="stylesheet" href="style1.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <script src="JS File.js"></script>
        <a href="index1.php" style="text-decoration: none;">
        <div class="headband">
            <h1>picturesque</h1>
            <p class="moto">A PHOTOGRAPHY JOURNAL</p>
        </div></a><br><br>
        <?php
        if(isset($_SESSION['userid'])){

            echo '<h2 style="text-align: center; font-size: 30px; color: black;">You are logged in!</h2>
            <div class="bbox">
                <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data" style="padding: 30px;">
                    <input type="file" name="img" placeholder="Choose an image" style="font-size: 15px; padding-top: 8px;padding-bottom: 8px; outline-color: red; margin-left: 74px;" required><br><br>

                    <input type="text" name="lnk" placeholder="Caption" style="font-size: 15px; border: solid 1px ;padding-top: 8px;padding-bottom: 8px;outline-color: red;" required><br><br>

                    <button type="submit" name="upld" class="signb" style="padding-left: 73px; padding-right: 73px;padding-top: 8px;padding-bottom: 8px; color: white; background-color: red;border: 0px;">Upload</button>';
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "formatunsupported") {
                            echo '<p style="color: red;">File Format Unsupported</p>';
                        }
                        elseif ($_GET['error'] == "bigfile") {
                            echo '<p style="color: red;">File is too big</p>';
                        }
                        elseif ($_GET['error'] == "failed") {
                            echo '<p style="color: red;">File Failed to Upload</p>';
                        }
                    }
                    elseif (isset($_GET['success'])){
                        if ($_GET['success'] == "uploaded") {
                        echo '<p style="color: green;">File Uploaded Successfully</p>';
                    }
                }
                echo '</form>

            </div><br><br>
            <div style="text-align: center;"><form action="includes/signout.inc.php" method="POST" style="padding: 30px;"><button type="submit" name="signout" class="signb2"">Sign Out</button></form>
            </div>';
        }
        else{
            echo '<h2 style="text-align: center; font-size: 30px; color: black;">You are logged Out!</h2><br><br><br>
            <div style="text-align: center;"><form action="ulogin.php" method="POST" style="padding: 30px;"><button type="submit" name="ulogin" class="signb2">Go to Login Page</button></form>
            </div>';
        }
        ?>


</html>
