<?php session_start();
    include('location.php');
    require('conectare.php');?>

<html>
    <head>
        <title> Test </title>
    </head>

    <body>
        <form method="post" action="test.php">
            Username
            <input type ="text" name="id">
            <input type ="submit" name="submit" placeholder="submit">
        </form>
    </body>

    <?php 
        $name = $_POST['id'];
        $sql = "SELECT * FROM utilizatori WHERE username = $name";
        echo $sql;
        $run = mysqli_query($server,$sql);
        $users =  mysqli_fetch_all($run, MYSQLI_ASSOC);
        echo $users['id'];
    ?>
