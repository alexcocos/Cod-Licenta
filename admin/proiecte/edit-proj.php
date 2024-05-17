<?php 
    session_start();
    include("../../location.php");
    include(ROOT_LOCATION . "/blocks/admin-nav.php");
    require('../../conectare.php');

    $finalId = $_POST['val-id'];    
    $sqlCateg = "SELECT * FROM categorii";
    $resultCateg = mysqli_query($server, $sqlCateg);
    $categorii = mysqli_fetch_all($resultCateg,MYSQLI_ASSOC);

    $sqlProj = 'SELECT * FROM proiecte'; 
    $resultProj = mysqli_query($server, $sqlProj);
    $proiecte = mysqli_fetch_all($resultProj,MYSQLI_ASSOC);
    
    $sqlUser = 'SELECT * FROM proiecte'; 
    $resultUser = mysqli_query($server, $sqlUser);
    $utilizatori = mysqli_fetch_all($resultUser,MYSQLI_ASSOC);
?>
      

<!DOCTYPE html>
   
    <head>
        <title> Editare Proiecte </title>
        <link rel="stylesheet" href="/licenta/css/admin/proiecte/adaugare-proj.css" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> </head>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
       
       <div class="parent">

         <div>
              <form action = "edit-proj.php" method="post" enctype="multipart/form-data">
                  <div>Titlu
                     <input type = "text" id = "titlu" name="titlu"> 
                  </div>
                  <div>Descriere
                      <input type = "text" id ="descriere" name="descriere">
                  </div>
                  <div>Imagine
                      <input type = "file" id ="imagine" name="imagine">
                  </div>
                  <div>Categorie
                  <select  name="categorie" >
                        <option value=""> </option>
                    <?php foreach($categorii as $categorie){?>
                        <option value="<?php echo $categorie['nume']?>">
                        <?php echo $categorie['nume'];}?></option></select>
                </div>
                  <div>
                    <input type = "hidden" value = '<?php echo $_GET['proj-id'];?>' name = "val-id"/>
                      <input type="checkbox" name="publicat"> Publica
                  <button name="submit" type="submit"> Editează Proiect </button>
              </form> 
          </div>


    <?php 
        

        foreach($proiecte as $proiect ){
            $titluIn = $proiect['titlu'];
            $descriereIn = $proiect['descriere'];
            $imagineIn = $proiect['imagine'];
            $categorieIn = $proiect['categorie'];
            $publicatIn = $proiect['publicat'];
        }

        if(isset($_POST['submit'])){
            if(empty($_POST['titlu'])){
                $titlu = $titluIn;
            }else{
                $titlu = $_POST['titlu'];
            }
        
            if(empty($_POST['descriere'])){
                $descriere = $descriereIn;
            }else{
                $descriere = $_POST['descriere'];
            }

            if(empty($_POST['imagine'])){
                $imagine = $imagineIn;
            }else{
                $numeImag = $_FILES['imagine']['name'];
                $tmp = $_FILES['imagine']['tmp_name'];
                $ext = explode('.', $numeImag);
                $extensie = strtolower(end($ext));
                $imagine = uniqid('',true).".".$imagine;
                $destinatie = '../../resurse/imagini/'.$imagine;
                move_uploaded_file($tmp,$destinatie);
            }
        
            if(empty($_POST['categorie'])){
                $categorie = $categoreiIn;
            }else{
                $categorie = $_POST['categorie'];
            }
        
            $id_admin = 0;

            if(isset($_POST['publicat'])){
            $publicat = 1;
            }
            else {
            $publicat = 0;
            }
        
        $query = "UPDATE proiecte SET titlu = '$titlu', descriere = '$descriere', imagine = '$imagine', categorie = '$categorie', publicat='$publicat' WHERE id = '$finalId'";
        $update = mysqli_query($server,$query);
    }        
    ?>


           
       </div>

     </body>

</html>
