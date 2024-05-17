<?php 
    include("../../location.php");
    include(ROOT_LOCATION . "/blocks/admin-nav.php");
    require('../../conectare.php');

    $sql = 'SELECT * FROM categorii'; 
    $result = mysqli_query($server, $sql);
    $categorii = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $errTitlu = $errDescriere = $errImagine ="";
        
    if(isset($_POST['submit'])){
    
        $titlu = $_POST['titlu'];
        $descriere = $_POST['descriere'];
        $imagine = $_POST['imagine'];
        $categorie = $_POST['categorie'];
        $id_admin = 0;
        
        if(empty($_POST['titlu'])){
            $errTitlu="Introduceti titlul";
        }
        if(empty($_POST['descriere'])){
            $errDescriere="Introduceti descriere";
        }
        if(empty($_POST['imagine'])){
            $errImagine="Introduceti imagine";
        }
        if(isset($_POST['publicat'])){
            $publicat = 1;
        }
        else {
            $publicat = 0;
        }

        $numeImag = $_FILES['imagine']['name'];
        $tmp = $_FILES['imagine']['tmp_name'];
        $ext = explode('.', $numeImag);
        $extensie = strtolower(end($ext));
        $numeNou = uniqid('',true).".".$extensie;
        $destinatie = '../../resurse/imagini/'.$numeNou;
        move_uploaded_file($tmp,$destinatie);

        if($errTitlu=="" && $errDescriere=="" && $errCategorie==""){
            $query = "INSERT INTO proiecte (titlu,descriere,imagine,categorie,id_admin,publicat) VALUES ('$titlu','$descriere','$numeNou','$categorie','$id_admin','$publicat')";
            $adaugare = mysqli_query($server,$query);
           echo $query;
        }
    }
?>



<!DOCTYPE html>
   
    <head>
        <title> Adaugare Proiecte </title>
        <link rel="stylesheet" href="/licenta/css/admin/proiecte/adaugare-proj.css" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> </head>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
       
       <div class="parent">

         <div>
              <form action = "adaugare-proj.php" method="post" enctype="multipart/form-data">
                  
                <div>Titlu
                     <input type = "text" id = "titlu" name="titlu"> 
                     <span class="error"><?php echo $errTitlu;?></span>
                </div>
                  
                <div>Descriere
                      <input type = "text" id ="descriere" name="descriere">
                      <span class="error"><?php echo $errDescriere;?></span>
                </div>
                  
                <div>Imagine
                      <input type = "file" id ="imagine" name="imagine">
                      <span class="error"><?php echo $errImagine;?></span>
                </div>
                  
                <div>Categorie
                    <select  name="categorie"required>
                        <option value=""> </option>
                    <?php foreach($categorii as $categorie){?>
                        
                        <option value="<?php echo $categorie['nume']?>">
                        <?php echo $categorie['nume'];}?></option>
                </div><span class="error"><?php echo $errCategorie;?></span>
                
                <input type="checkbox" name="publicat"> Publica
                <button name="submit" type="submit"> Adauga Proiect </button>

              </form> 
          </div>

       </div>

     </body>

</html>