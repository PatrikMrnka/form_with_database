<?php
    include "mySQL/db.php";
    Connection();

    // $connection = mysqli_connect("localhost", "root", "", "login_application"); // server, login_name, login_password, database_name
    
    // if ($connection) { // pokud proměnná $connection něco obsahuje, úspěšně jsme se připojili k databázi
    //     echo "Jsme propojeni s databází";
    // } else {
    //     // echo "Oooh, něco se pokazilo";
    //     echo "Oooh, něco se pokazilo";
    // }

    // $querySelect = "SELECT * FROM users";

    // $resultSelect = mysqli_query($connection, $querySelect);

    // if (!$resultSelect) {
    //     echo "něco je špatně";
    // } else {
    //     echo "vše je v pořádku";
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

    // while($row = mysqli_fetch_assoc($resultSelect)){
    //     echo "<pre>";
    //     print_r($row);
    //     echo "</pre>";
    // }
        Select();
    ?>

</body>
</html>