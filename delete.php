<?php 

    include "mySQL/db.php";
    Connection();

    $querySelect = "SELECT * FROM users";
    $resultSelect = mysqli_query($connection, $querySelect);

    // kontrola, zda byl formulář odeslán
    if (isset($_POST["submit"])) {
        Delete();
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
    <form action="delete.php" method="post"> 
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