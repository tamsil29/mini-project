<?php
session_start();
$dbh = mysqli_connect("localhost", "root", "", "photos");
$limit = 5;
if(isset($_GET['page'])){
   $pn = $_GET['page'];
}else{
    $pn = 1;
}
$start_from = ($pn - 1) * $limit;
$sql = "SELECT * FROM images ORDER BY id DESC  LIMIT $start_from, $limit";
$result = mysqli_query($dbh, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>picturesque home</title>
        <link rel="stylesheet" href="style1.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="index1.php" style="text-decoration: none;">
        <div class="headband">
            <h1>picturesque</h1>
            <p class="moto">A PHOTOGRAPHY JOURNAL</p>
        </div></a>
        <?php
        if(isset($_SESSION['userid'])){
        echo'<div class="signs"><div class="dis1">
            <a href="update.php">
                <button class="signb" type="submit" name="update">Upload</button>
            </a></div>
            <div class="dis2">
            <form action="includes/signout.inc.php" method="POST">
                <button class="signb" type="submit" name="signout">Sign out</button>
            </form></div>
        </div>';
      }
      else{
        echo'<div class="signs"><div class="dis1">
            <a href="signupform.php">
                <button class="signb" type="submit" name="signup">Sign up</button>
            </a></div>
            <div class="dis2">
            <form action="ulogin.php" method="POST">
                <button class="signb" type="submit" name="ulogin">Sign in</button>
            </form></div>
        </div>';
      }
      ?>
        <div style="text-align: center;"><h2 style="color: black;">Recent Posts</h2></div>
        <div class="bbox">
          <?php
                 $result = mysqli_query($dbh, $sql);
                 while($row = mysqli_fetch_array($result)){
            echo'<div class="content">';
                echo'<div class="forpics">';
                    echo'<img src= "pics/'.$row['image'].'" class="fpics">';
                echo'</div>';
                echo'<div class="username">';
                    echo'<h2 class="usrnm">'.$row['name'].'</h2>';
                echo'</div>';
                echo'<div class="caption">';
                    echo'<h3 style="font-size: 17px; font-weight: bold; text-align: left;">Caption:</h3></div>';
                echo'<div class="text">';
                    echo'<input type="text" value="'.$row['text'].'" class="written" readonly></div>';
                  }
            ?>
            <div class="mapping">
<?php
$sql = "SELECT COUNT(*) FROM images";
$result = mysqli_query($dbh, $sql);
$row = mysqli_fetch_array($result);
$total_records = $row[0];

$total_pages = ceil($total_records / $limit);
$k = (($pn+1>$total_pages)?$total_pages-2:(($pn-1<1)?2:$pn));
$pagelink = " ";
if($pn>=2){
    //echo '<a href = "hp-1.php?page=1"><button type="button" class="navbtn"><<</button></a>';
    echo '<a href = "index1.php?page='.($pn-1).'"><button type="button" class="navbtn"><</button></a>';
}
for($i=-1; $i<=2; $i++){
    if($k+$i==$pn){
        $pagelink .= '<a href = "index1.php?page='.($k+$i).'"><button type="button" class="navbtn" style="background-color: white;">'.($k+$i).'</button></a>';
    }
    else{
       $pagelink .= '<a href = "index1.php?page='.($k+$i).'"><button type="button" class="navbtn">'.($k+$i).'</button></a>';
    }
};
echo $pagelink;
if($pn<$total_pages){
    echo '<a href = "index1.php?page='.($pn+1).'"><button type="button" class="navbtn">></button></a>';
    //echo '<a href = "hp-1.php?page='.$total_pages.'"><button type="button" class="navbtn">>></button></a>';
}
?>
</div>
        </div>
    </body>
</html>
