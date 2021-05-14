<?php
    // připojení do databáze
    include "mySQL/db.php";

    $querySelect = "SELECT * FROM users";

    $result = mysqli_query($connection, $querySelect); // poslání příkazu z $query do databáze $connection
        if (!$result) { 
        die("Dotaz do databáze selhal".mysqli_error());
    }

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $id = $_POST["id"];

        $queryUpdate = "UPDATE users SET username='$username', password='$password' WHERE id='$id'";

        $resultUpdate = mysqli_query($connection, $queryUpdate);
        if (!$resultUpdate) {
            die("Query selhalo".mysqli_error());
        }
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
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    echo "<option value='$id'>$id</option>";
                }
            ?>
        </select>
        <input type="submit" name="submit" value="Odeslat">
    </form>
</body>
</html>