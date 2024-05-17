<?php include("../../location.php")?>
<?php include(ROOT_LOCATION . "/blocks/admin-nav.php");?>
<?php require('../../conectare.php')?>

<!DOCTYPE html>
    <head>
        <title> Administrare Categorii </title>
        <link rel="stylesheet" href="/licenta/css/admin/proiecte/admin-proj.css" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> </head>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
       
        <div class="parent">
        <div>
        <a href="<?php echo MAIN_URL . '/admin/categorii/adaugare-categ.php'?> " > Adaugare Categorie </a> 
</div>
            <?php
                $sql = 'SELECT * FROM categorii'; 
                $result = mysqli_query($server, $sql);
                $categorii = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $count=0;
            ?>

            <div class="tabel">
            <h1> Administrare Categorii </h1>
            
                <table> 

                    <tr class="main-row">
                        <th> Id </th>
                        <th> Titlu </th>
                        <th> Actiune </th>
                    </tr>

                    <?php foreach($categorii as $categorie){ ?>
    
                    <tr> 
                        <td> <?php echo $categorie['id'];?>
                        <td> <?php echo $categorie['nume'];?>
                        
                        <td> 
                            <form action = "edit-categ.php" method = "GET">
                                <input type = "hidden" value = "<?php echo $categorie['id'];?>" name ="categ-id">
                                <input type= "submit" value ="Editează"></input>
                            </form>
                        <td>

                        <form method = "POST">
                            <input type = submit name = Delete value = Sterge />
                            <input type = "hidden" value ="<?php echo $categorie['id'];?>"  name="did"> 
                        </form>
                    </tr>
                    
                    <?php } ?>

                </table>
           
            <?php if(isset($_POST['Delete'])){
                $query = "DELETE from categorii WHERE id= " . $_POST['did'];
                $delete = mysqli_query($server,$query);
            }?>
            </div>
            
        </div>

    </body>

</html>

