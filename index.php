<?php 
    session_start();
    include("location.php");
    include(ROOT_LOCATION . "/blocks/nav.php");?>

<!DOCTYPE html>
<head>

    <title> Casa Pâinii </title>
    <link rel="stylesheet" href="css/acasa.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="parent">
        <div class="child-1">
            <div class="h1-acasa">Locul unde persoanele defavorizate pot găsi<br> un sprijin </div>
            <div class="h2-acasa">sprijinim comunități de romi prin diverse proiecte precum programe de hrănire, construire de locuințe și programe religioase </div>
            <button class="buton-acasa"><a href="proiecte.php">vezi proiectele noastre!</a></button>
        </div>

        <div class="child-2" >
            <image src="resurse/imagini/62137433.jpg" class="image" /> 
            <image src="resurse/imagini/arrow.png" class="arrow-image"/>
        </div>
    </div>

    <?php include(ROOT_LOCATION . "/blocks/footer.php");?>
</body>
</html>

