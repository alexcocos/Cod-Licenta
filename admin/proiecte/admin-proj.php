<?php include("../../location.php")?>
<?php include(ROOT_LOCATION . "/blocks/admin-nav.php");?>
<?php require('../../conectare.php')?>

<!DOCTYPE html>
    <head>
        <title> Administrare Proiecte </title>
        <link rel="stylesheet" href="/licenta/css/admin/proiecte/admin-proj.css" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> </head>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
       
        <div class="parent">

            <?php
                $sql = 'SELECT * FROM proiecte'; 
                $result = mysqli_query($server, $sql);
                $proiecte = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $count=0;
            ?>
            <a href="<?php echo MAIN_URL . '/admin/proiecte/adaugare-proj.php'?> " > Adaugare Proiect </a> 

            <div class="tabel">
            <h1> Administrare Proiecte </h1>
            
                <table> 

                    <tr class="main-row">
                        <th> Id </th>
                        <th> Titlu </th>
                        <th> Actiune </th>
                    </tr>

                    <?php foreach($proiecte as $proiect){ ?>
    
                    <tr> 
                        <td> <?php echo $proiect['id'];?>
                        <td> <?php echo $proiect['titlu'];?>
                        
                        <td> 
                            <form action = "edit-proj.php" method = "GET">
                                <input type = "hidden" value = "<?php echo $proiect['id'];?>" name ="proj-id">
                                <input type= "submit" value ="Editează"></input>
                            </form>
                        <td>

                        <form method = "POST">
                            <input type = submit name = Delete value = Sterge />
                            <input type = "hidden" value ="<?php echo $proiect['id'];?>"  name="did"> 
                        </form>
                    </tr>
                    
                    <?php } ?>

                </table>
           
            <?php if(isset($_POST['Delete'])){
                $query = "DELETE from proiecte WHERE id= " . $_POST['did'];
                $delete = mysqli_query($server,$query);
            }?>
            </div>
            
        </div>

    </body>

</html>

