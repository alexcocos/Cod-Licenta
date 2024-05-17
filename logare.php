<?php session_start();
    require('conectare.php');
    include('location.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM utilizatori WHERE username = '$username'";
    $run = mysqli_query($server,$query);
    $user = mysqli_fetch_all($run,MYSQLI_ASSOC);
    foreach($user as $us){
        $hashed_pass = $us['parola'];
        $id_admin = $us['id'];}
    $errUser = $errPass = $errPassVer ="";
    
    if(isset($_POST['submit'])){
        if(empty($_POST['username'])){
            $errUser = "Introduceti numele de utilizator!";
        }
        if($run->num_rows<1){
            $errNoUser = "Utilizatorul nu există";
        }
        
        if(empty($_POST['password'])){
            $errPass = "Introduceti parola!";
        }
        if(!empty($_POST['password'])){
        if(!password_verify($password,$hashed_pass)){
                $errPassVer = "Parola nu este corectă!";
        }
        }
        
        if($errUser=="" && $errPass=="" && $errPassVer=="" && $errNoUser==""){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $pass;
            $_SESSION['loggedin'] = true;
            $_SESSION['admin'] = $id_admin;
            header("Location: " . MAIN_URL . "/");
        }

    }?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/logare.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 </head>

<body>
    <div class="parent">
        <div class= "container">
            <form action="logare.php" method="post">
                <h3>AUTENTIFICARE</h3>
                <div class="div-logare">
                    <input type="text" name="username" placeholder="Nume Utilizator" >
                    <span class="error"><?php echo $errUser;?></span>
                    <span class="error"><?php echo $errNoUser;?></span>
                </div>  
                <div class="div-logare">
                    <input type="password" name="password" placeholder="Parola">
                    <span class="error"><?php echo $errPass;?></span>
                    <span class="error"><?php echo $errPassVer;?></span>
                </div>
                <button name="submit"  class="trimite" type="submit">CONECTEAZĂ-TE</button>
                <span> Nu ai un cont?</span>
                <a href="<?php echo MAIN_URL . '/inregistrare.php'?>"> Inregistrează-te </a>
            </form>
            
        </div>
    </div>
</body>

</html>
