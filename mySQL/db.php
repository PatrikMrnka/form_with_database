<?php
    // připojení do databáze
    $connection = mysqli_connect("localhost", "root", "", "login_application"); // server, login_name, login_password, database_name
    
    // if ($connection) { // pokud proměnná $connection něco obsahuje, úspěšně jsme se připojili k databázi
    //     echo "Jsme propojeni s databází";
    // } else {
    //     // echo "Oooh, něco se pokazilo";
    //     die("Oooh, něco se pokazilo");
    // }
    
    // $queryInsert = "INSERT INTO users(username, password) VALUES('$username','$password')"; // proměnná s příkazem vložení dat z $username a $password do databáze SQL
    $querySelect = "SELECT * FROM users";

    $result = mysqli_query($connection, $querySelect); // poslání příkazu z $query do databáze $connection
        if (!$result) { 
        die("Dotaz do databáze selhal".mysqli_error());
    }
?>