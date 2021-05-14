<?php
    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // ověření, zda $username a $password existují = odeslala data z formuláře
        if ($username && $password) {
            echo $username;
            echo "<br>";
            echo $password;
            echo "<br>";
        } else {
            echo "Něco nám chybí";
        }

        // připojení do databáze
        $connection = mysqli_connect("localhost", "root", "", "login_application"); // server, login_name, login_password, database_name
        
        if ($connection) { // pokud proměnná $connection něco obsahuje, úspěšně jsme se připojili k databázi
            echo "Jsme propojeni s databází";
        } else {
            // echo "Oooh, něco se pokazilo";
            die("Oooh, něco se pokazilo");
        }

        $query = "INSERT INTO users(username, password) VALUES('$username','$password')"; // proměnná s příkazem vložení dat z $username a $password do databáze SQL

        $result = mysqli_query($connection, $query); // poslání příkazu z $query do databáze $connection

        if (!$result) { 
            die("Dotaz do databáze selhal".mysqli_error());
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
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Uživatelské jméno">
        <br>
        <input type="password" name="password" placeholder="Heslo">
        <br>
        <input type="submit" name="submit" value="Odeslat">
    </form>
</body>
</html>