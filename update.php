<?php
    // připojení do databáze
    include "mySQL/db.php";
    Connection();
    // Select(); // výpis všech údajů z databáze

    // výběr všech dat z databáze
    Select();

    // načtení dat z formuláře a dotaz z databáze
    if (isset($_POST["submit"])) { // jestli byl spuštěn příkaz submit, proveď následující funkci
        Update(); // funkce pro Update údajů v databázi
    }

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
    <form action="update.php" method="post"> 
        <input type="text" name="username" placeholder="Uživatelské jméno">
        <br>
        <input type="password" name="password" placeholder="Heslo">
        <br>
        <select name="id">
            <?php 
                while($option = mysqli_fetch_assoc($resultSelect)) {
                    $id = $option["id"];
                    echo "<option value='$id'>$id</option>";
                }
            ?>
        </select>
        <input type="submit" name="submit" value="Odeslat">
    </form>
</body>
</html>