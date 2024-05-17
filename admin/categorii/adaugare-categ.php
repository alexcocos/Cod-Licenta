<?php include("../../location.php");
      include(ROOT_LOCATION . "/blocks/admin-nav.php");
      require('../../conectare.php');

      $nume = $_POST['nume'];
      $descriere = $_POST['descriere'];
      $categSql ="SELECT * FROM categorii WHERE nume = '$nume'";
      $categResult = mysqli_query($server,$categSql);
      $errDescriere = "";
      $errTest="";

      if(isset($_POST['submit'])){
        if(empty($_POST['nume'])){
            $errTest="Introduceti nume";
        }
        if($categResult->num_rows>0){
            $errTest="Aceasta categorie exista deja";
        }
        if(empty($_POST['descriere'])){
            $errDescriere="Introduceti descriere!";
        }
        if($errTest=="" && $errDescriere==""){
            $query = "INSERT INTO categorii (nume,descriere) VALUES ('$nume','$descriere')";
            echo $query;
            $adaugare = mysqli_query($server,$query);
            header('Location: ' . MAIN_URL . '/admin/categorii/admin-categ.php');
        }
      }
?>
      

<!DOCTYPE html>
   
    <head>
        <title> Adaugare Categorii </title>
        <link rel="stylesheet" href="/licenta/css/admin/proiecte/admin-proj.css" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> </head>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
       
       <div class="parent">
        
         <div>
              <form action = "adaugare-categ.php" method="post" enctype="multipart/form-data">
                  <div>Nume
                  <input type = "text" name ="nume">
                  <span class="error"><?php echo $errTest;?></span>
                  </div>
                  
                  <div>Descriere
                      <input type = "text" id ="descriere" name="descriere">
                      <span class="error"><?php echo $errDescriere;?></span>
                  </div>
                  <?php print_r($_POST); echo $errNume;?>
                
                  <button name="submit" type="submit"> Adauga Categorie </button>
              </form> 
          </div>

       </div>

     </body>

</html>
