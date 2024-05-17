<?php session_start();
    include("location.php");
    include(ROOT_LOCATION . "/blocks/nav.php");
    require('conectare.php');
    $sql = 'SELECT * FROM proiecte'; 
    $result = mysqli_query($server, $sql);
    $proiecte = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $categ = 'SELECT * FROM categorii'; 
    $result_categ = mysqli_query($server, $categ);
    $categorii = mysqli_fetch_all($result_categ,MYSQLI_ASSOC);
?>

<!DOCTYPE html>

<head>
    <title>Proiecte</title>
    <link rel="stylesheet" href="css/proiecte.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>

    <div class="categorie">
            <form method = "get" action="proiecte.php">
            Categorie
                <select name = "categorie">
                    <?php foreach($categorii as $categorie){?>
                    <option value="<?php echo $categorie['id']?>">
                    <?php echo $categorie['nume'];?></option> <?php }?>
                    <input type ="submit" name="submit">
                </select>
                        
            </form>
        </div>

    <div class="parent">

       
                
        <?php if(isset($_GET['submit'])){
                
            foreach($proiecte as $proiect){ 

                if($proiect['publicat']==1){
                    if($proiect['categorie'] == $_GET['categorie']){?>
                        <div class="single-proj">
        
                            <div class="imagine-div">
                                <img class="proj-image" alt="no" src="resurse/imagini/<?php echo $proiect['imagine'];?>"  />
                            </div>    
        
                            <div class="corp-proj">
                                <h1 class="titlu-proiect"><?php echo $proiect['titlu']?></h1>
                                <h2 class="descriere-proiect"><?php echo $proiect['descriere']?></h2>
                             </div>
                        </div>
                    <?php } 
                }
               
            }
        
        }
        else{
            foreach($proiecte as $proiect){
                if($proiect['publicat']==1){?>
                <div class="single-proj">

                    <div class="imagine-div">
                        <img class="proj-image" alt="no" src="resurse/imagini/<?php echo $proiect['imagine'];?>"  />
                    </div>    

                    <div class="corp-proj">
                        <h1 class="titlu-proiect"><?php echo $proiect['titlu']?></h1>
                        <h2 class="descriere-proiect"><?php echo $proiect['descriere']?></h2>
                    </div>
                </div>

                <?php }
            }
        }?>
            
    </div>

    <div>
        <?php include(ROOT_LOCATION . "/blocks/footer.php");?>
    </div>

</body>

</html>