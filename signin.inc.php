<?php 
 if(isset($_POST['sign-in'])){

    $logins = array('abhilodu'=> 'doglapun913','saquiblodu'=>'doglapun913', 'tamsilhero'=>'doglapun913');

    $Username = isset($_POST['userid']) ? $_POST['userid'] : '';
    $Password = isset($_POST['pswrd']) ? $_POST['pswrd'] : '';

    if (isset($logins[$Username]) && $logins[$Username] == $Password){
        session_start();
        $_SESSION['UserData']['Username']=$logins[$Username];
        header("location: ../update.php");
        exit();
    }
    else{
        header("Location: ./ulogin.php?error=fault");
        exit();
    }
}

    /*if(isset($_POST['sign-in'])){
    
    $username = $_POST['userid'];
    $password = $_POST['pswrd'];

    if(empty($username) || empty($password)) {
        header("Location: ./ulogin.php?error=emptyfields&userid=".$username);
        exit();
    }
    elseif($username!== "abhilodu" || "saquiblodu" || "tamsilhero") {
        header("Location: ./ulogin.php?error=invalieduserid");
        exit();
    
    elseif($password!=="doglapun913"){
        header("Location: ./ulogin.php?error=invalieduserpass");
        exit();
    }
    if ($username== "abhilodu" || "saquiblodu" || "tamsilhero"){
        ($username==true);
    }
    
    elseif($password=="doglapun913"){
        ($password==true); 
    }
    if($username==true && $password==true){
        session_start();
        header("Location: ./update.php")
    }
    else{
        header("Location: ./ulogin.php?error=fault");
        exit();
    }
    
    


}*/
