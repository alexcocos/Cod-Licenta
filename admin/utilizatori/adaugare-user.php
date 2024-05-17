<?php 
    session_start();
    require("../../conectare.php");
    include('../../location.php');
    include(ROOT_LOCATION . "/blocks/admin-nav.php");
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    if(isset($_POST['admin'])){
        $admin = '1';
    }
    else{
        $admin = '0';
    }

    print_r($_POST);
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
            header("Location: " . MAIN_URL . "/admin/utilizatori/admin-user.php");
        }
    }
?>

<!DOCTYPE html>
   
    <head>
        <title> Adaugare Utilizator  </title>
        <link rel="stylesheet" href="/licenta/css/admin/proiecte/adaugare-proj.css" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> </head>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
       
       <div class="parent">

         <div>
              <form action = "adaugare-user.php" method="post" enctype="multipart/form-data">
                  <div>Nume Utilizator
                  <input type = "text" id = "username" name="username">
                  <span class="error"><?php echo $errUser;?></span>
                  </div>
                  <div>Email
                      <input type = "email" id ="email" name="email">
                      <span class="error"><?php echo $errEmail;?></span>
                  </div>
                  <div>Parola
                      <input type = "password" id ="password" name="password">
                      <span class="error"><?php echo $errPass;?></span>
                      <span class="error"><?php echo $difPass;?></span>
                  </div>
                  <div>Confirmare Parola
                      <input type = "password" id ="passwordConf" name="passwordConf">
                      <span class="error"><?php echo $errPassConf;?></span>
                  </div>

                      <input type="checkbox" name="admin"> Admin
                  <button name="submit" type="submit"> Adauga Utilizator </button>
              </form> 
          </div>

       </div>

     </body>

</html>
