<?php include("../../location.php");
      include(ROOT_LOCATION . "/blocks/admin-nav.php");
      require('../../conectare.php');
      $sql = 'SELECT * FROM utilizatori'; 
      $result = mysqli_query($server, $sql);
      $utilizatori = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
      

<!DOCTYPE html>
   
    <head>
        <title> Modificare Utilizator </title>
        <link rel="stylesheet" href="/licenta/css/admin/proiecte/adaugare-proj.css" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> </head>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
       
       <div class="parent">

       <div>
              <form action = "edit-user.php" method="post" enctype="multipart/form-data">
                  <div>Nume Utilizator
                  <?php foreach($utilizatori as $utilizator){
                  if($utilizator['id'] == $_GET['user-id']){
                     echo $utilizator['username'];
                  }}?>
                  </div>
                  <div>Email
                  <?php foreach($utilizatori as $utilizator){
                  if($utilizator['id'] == $_GET['user-id']){
                     echo $utilizator['email'];
                  }}?>
                  </div>
                    <input type = "hidden" value = '<?php echo $_GET['user-id'];?>' name = "val-id"/>
                    <input type="checkbox" name="admin"> Admin
                  <button name="submit" type="submit"> Adauga Utilizator </button>
              </form> 
          </div>


          <?php 
              
        $finalId = $_POST['val-id'];
         if(isset($_POST['submit'])){

            if(isset($_POST['admin'])){
                $admin = '1';
            }
            else{
                $admin = '0';
            }

            $query = "UPDATE utilizatori SET admin = '$admin' WHERE id =" . $finalId;
            $adaugare = mysqli_query($server,$query);
            header('Location: ' . MAIN_URL . '/admin/utilizatori/admin-user.php');
        }  
?>


           
       </div>

     </body>

</html>
