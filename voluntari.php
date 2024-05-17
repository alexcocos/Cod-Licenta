<?php session_start();?>
<?php include("location.php")?>
<?php include(ROOT_LOCATION . "/blocks/nav.php");?>
<!DOCTYPE html>
<head>
    <title> Voluntariat </title>
    <link rel="stylesheet" href="css/voluntari.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="parent">   
        <?php if(isset($_SESSION['username'])): ?>
        
        <div>
            <image src="resurse/imagini/home.jpg" class="image" />
        </div>
        <div class="container-voluntariat">
            <form method="post" name="myemailform2" action="form-to-email.php">
                <h1 class="h1-voluntariat"> FORMULAR DE VOLUNTARIAT </h1>
                <div class="split">
                    <div class="div-voluntariat first" ><input type="text" name="nume" placeholder="Nume"></div>
                    <div class="div-voluntariat second" ><input type="text" name="prenume" placeholder="Prenume"></div>
                    <div class="div-voluntariat third" ><input type="text" name="telefon" placeholder="Telefon" ></div>
                    <div class="div-voluntariat fourth" ><input type="text" name="email" placeholder="Email"></div>
                    <div class=" "> <textarea class="formm" name="mesaj" placeholder="Proiectul pentru care doriti sa voluntariati"></textarea></div>
                </div>
                <div ><input class="trimite " type="submit" value="Trimite"></div>
        </div>

        <?php else: ?>

        <div class="">
        <h1 class="h1-voluntariat"> Pentru voluntariat este nevoie de autentificare </h1>
        <button class="auth"> Mergi la autentificare </button>
        </div>
        <?php endif; ?>
    </div>

    <?php include(ROOT_LOCATION . "/blocks/footer.php");?>
</body>

<html>