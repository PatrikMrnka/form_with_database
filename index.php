<?php
    include "mySQL/db.php";
    Connection();

    if (isset($_POST["submit"])) {
        Add();
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

    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Uživatelské jméno">
        <br>
        <input type="password" name="password" placeholder="Heslo">
        <br>
        <input type="submit" name="submit" value="Odeslat">
    </form>

    <p>Chci změnit parametry určitého objektu: <a href="update.php">Update</a></p>
    <p>Chci vymazat určitý objekt z databáze: <a href="delete.php">Delete</a></p>
    
    <?php
    while($row = mysqli_fetch_assoc($resultSelect)){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    ?>

</body>
</html>