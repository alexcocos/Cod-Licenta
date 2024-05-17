<?php session_start();
include('conectare.php');
include('location.php');
$usr = $_SESSION['username'];
if($_SESSION['loggedin'] == true){
$sql="SELECT admin FROM utilizatori WHERE username = '$usr'";
$run = mysqli_query($server,$sql);
$users = mysqli_fetch_all($run,MYSQLI_ASSOC);
$_SESSION['admin'] = $users['admin'];
}?>


<nav class="nav">

  <div class="left">
    <a href="<?php echo MAIN_URL ?>" class="brand">Casa Pâinii</a>
    <link rel="stylesheet" href="css/nav.css">
  </div>

  <div class="center">
    <ul class="menu">
      <li> <a href="<?php echo MAIN_URL ?>" class="items">Acasă</a></li>
      <li> <a href="<?php echo MAIN_URL . '/proiecte.php'?>" class="items">Proiecte</a></li>
      <li> <a href="<?php echo MAIN_URL . '/voluntari.php'?>" class="items">Voluntariat</a></li>
      <li> <a href="<?php echo MAIN_URL . '/contact.php'?>" class="items">Contact</a></li>

      
      <?php foreach($users as $user){
         if($user['admin'] == 1 ){?>
          <a href="<?php echo MAIN_URL . '/admin/proiecte/admin-proj.php'?>" > Administrare </a>
      <?php }}?>
    </ul>
  </div>

  <div class="right" >
  
    <?php if($_SESSION['loggedin'] == true):?>

      <div class="donate" onmouseover="document.getElementById('div-auth').style.display='block'" ><?php echo $_SESSION['username'];?>
      </div>
         
      <div id="div-auth" style="display:none">
        <a href="deconectare.php" >Deconectare</a>  
      </div>

    <?php else :?>
      <div>
      <a href="<?php echo MAIN_URL . '/logare.php'?>">Autentificare </a>
    </div>
    <?php endif; ?>
  
  </div>

  <button class="donate"><a href="https://www.paypal.com/donate/?hosted_button_id=NDAC3ZGK5D53L">Donează</a></button>

</nav>