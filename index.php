<?php
    include "mySQL/db.php";
    /* Vypsání dat z databáze
    C - create (vytvoř)
    R - read (přečti)
    U - update (uprav stávající)
    D - delete (vymaž)
    */
    
    // if(isset($_POST["submit"])) {
    //     $username = $_POST["username"];
    //     $password = $_POST["password"];

    //     // ověření, zda $username a $password existují = odeslala data z formuláře
    //     if ($username && $password) {
    //         echo $username;
    //         echo "<br>";
    //         echo $password;
    //         echo "<br>";
    //     } else {
    //         echo "Něco nám chybí";
    //     }

        
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulář PHP s databází</title>
</head>
<body>

    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Uživatelské jméno">
        <br>
        <input type="password" name="password" placeholder="Heslo">
        <br>
        <input type="submit" name="submit" value="Odeslat">
    </form>

    <?php 
    // while ($row = mysqli_fetch_assoc($result)) {
    //     print_r($row);
    // }

    // while ($row = mysqli_fetch_row($result)) {
    //     print_r($row);
    // }

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    ?>
</body>
</html>