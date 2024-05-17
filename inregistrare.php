
<?php require("conectare.php");
include('location.php');
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConf = $_POST['passwordConf'];
$admin = '0';
$errUser = $errEmail = $errPass = $errPassConf = $difPass ="";

$userSql="SELECT * FROM utilizatori WHERE username = '$username'";
$userResult = mysqli_query($server, $userSql);
$emailSql="SELECT * FROM utilizatori WHERE email = '$email'";
$emailResult=mysqli_query($server, $emailSql);

if(isset($_POST['submit'])){
    if(empty($_POST['username'])){
        $errUser = "Introduceti numele de utilizator!";
    }
    else if($userResult->num_rows>0){
        $errUser = "Acest nume de utilizator este folosit deja";
    }
    
    if(empty($_POST['email'])){
        $errEmail = "Introduceti email-ul!";
    }
    else if($emailResult->num_rows>0){
        $errEmail = "Acest email este folosit deja!";
    }
    if(empty($_POST['password'])){
        $errPass = "Introduceti parola!";
    }
    if(empty($_POST['passwordConf'])){
        $errPassConf = "Introduceti Confirmarea Parolei!";
    }
    if($password!=$passwordConf){
        $difPass = "Parolele diferă";
    }
    if($errUser=="" && $errEmail=="" && $errPass=="" && $errPassConf=="" && $difPass==""){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO utilizatori(admin,username,email,parola) VALUES ('$admin', '$username', '$email', '$password')";
        $adaugare = mysqli_query($server,$query);
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $pass;
        $_SESSION['loggedin'] = true;
        header("Location: " . MAIN_URL . "/");
    }
}



?>

<html>
    <head>
        <title> Înregistrare </title>
        <link rel="stylesheet" href="css/inreg.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="parent">
        <div class="container">
            <form action = "inregistrare.php" method="post">
            <h3>ÎNREGISTRARE</h3>
                <div class="split">
                    <div class="div-logare">
                        <input type = "text" id = "username" name="username" placeholder = "Nume de utilizator">
                        <span class="error"><?php echo $errUser;?></span>
                    </div>
                    <div class="div-logare">
                        <input type = "email" id ="email" name="email" placeholder = "Email">
                        <span class="error"><?php echo $errEmail;?></span>
                    </div>
                </div>
                <div class="split">
                    <div class="div-logare">
                        <input type = "password" id ="password" name="password" placeholder = "Parola" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Parola trebuie sa conțină cel puțin 8 caractere, cel puțin un număr, o literă mică și una cu majusculă .">
                        <span class="error"><?php echo $errPass;?></span>
                        <span class="error"><?php echo $difPass;?></span>
                    </div>
                    <div class="div-logare">
                        <input type = "password" id ="passwordConf" name="passwordConf" placeholder = "Confirma Parola" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Parola trebuie sa conțină cel puțin 8 caractere, cel puțin un număr, o literă mică și una cu majusculă .">
                        <span class="error"><?php echo $errPassConf;?></span>
                    </div>
                </div>
                <button name="submit" class="trimite" type="submit"> Înregistrează-te </button>
                <span> Ai deja un cont?</span>
                <a href="<?php echo MAIN_URL . '/logare.php'?>"> Loghează-te </a>
            </form> 
        </div>
        </div>
    </body>

</html>



   


