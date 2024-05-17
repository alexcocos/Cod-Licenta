<?php 
    include("../../location.php");
    include(ROOT_LOCATION . "/blocks/admin-nav.php");
    require('../../conectare.php');

          
?>
      

<!DOCTYPE html>
   
    <head>
        <title> Adaugare Categorii </title>
        <link rel="stylesheet" href="/licenta/css/admin/proiecte/adaugare-proj.css" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> </head>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
       
       <div class="parent">

         <div>
              <form action = "edit-categ.php" method="post" enctype="multipart/form-data">
                  <div>Nume 
                     <input type = "text" id = "nume" name="nume"> 
                  </div>
                  <div>Descriere
                      <input type = "text" id ="descriere" name="descriere">
                  </div>
                 
                    <input type = "hidden" value = '<?php echo $_GET['categ-id'];?>' name = "val-id"/>
                  <button name="submit" type="submit"> Adauga Proiect </button>
              </form> 
          </div>


          <?php 
         $finalId = $_POST['val-id'];
    $sql = "SELECT * FROM categorii WHERE id = " . $finalId; 
    $result = mysqli_query($server, $sql);
    $categorii = mysqli_fetch_all($result,MYSQLI_ASSOC);

    foreach($categorii as $categorie){
        $numeIn = $categorie['nume'];
        $descriereIn = $categorie['descriere'];
    }

    if(isset($_POST['submit'])){
        if(empty($_POST['nume'])){
            $nume = $numeIn;
        }
        else{
            $nume = $_POST['nume'];
        }
        if(empty($_POST['descriere'])){
            $descriere = $descriereIn;
        }
        else{
            $descriere = $_POST['descriere'];
        }

        $query = "UPDATE categorii SET nume = '$nume', descriere = '$descriere' WHERE id = " . $finalId;
        $update = mysqli_query($server,$query);
        header("Location: " . MAIN_URL . '/admin/categorii/admin-categ.php');
    } 
?>


           
       </div>

     </body>

</html>
