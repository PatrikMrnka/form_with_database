<?php

function Connection(){ // funkce pro připojení do databáze

    // připojení do databáze
    global $connection;
    $connection = mysqli_connect("localhost", "root", "", "login_application"); // server, login_name, login_password, database_name
    
    if ($connection) { // pokud proměnná $connection něco obsahuje, úspěšně jsme se připojili k databázi
        echo "Jsme propojeni s databází";
    } else {
        echo "Oooh, něco se pokazilo";
    }
}

function Update() { // funkce pro změnu údajů v databázi na určeném ID
    global $connection;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_POST["id"];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $queryUpdate = "UPDATE users SET username='$username', password='$password' WHERE id = $id";
    $resultUpdate = mysqli_query($connection, $queryUpdate);

    if (!$resultUpdate) {
        die("Query selhalo" . mysqli_error());
    }
}

function Add() { // funkce pro přidání do databáze (jméno a heslo)
    global $connection;
    $username = $_POST["username"];
    $password = $_POST["password"];

    // escapování inputů
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    // hashování hesla
    $hashFormat = "$2y$10$";
    $salt = "u9YPT1kh13fEPGlMmkWrID";
    $hasFormat_salt = $hashFormat.$salt;
    $password = crypt($password, $hasFormat_salt);

    // vložení dat do databáze
    $queryAdd = "INSERT INTO users(username, password) VALUES('$username','$password')"; // proměnná s příkazem vložení dat z $username a $password do databáze SQL
    $resultAdd = mysqli_query($connection, $queryAdd);

    if (!$resultAdd) {
        echo "Nepodařilo se data zapsat do databáze.";
    }
}

function Select() { // funkce pro vypsání celé databáze s parametry
    global $connection;
    global $resultSelect;

    $querySelect = "SELECT * FROM users";

    $resultSelect = mysqli_query($connection, $querySelect);

    if (!$resultSelect) {
        echo "něco je špatně";
    } else {
        echo "vše je v pořádku";
    }

    // while($row = mysqli_fetch_assoc($resultSelect)){
    //     echo "<pre>";
    //     print_r($row);
    //     echo "</pre>";
    // }

}

function Delete() { // funkce pro vymazání určitého objektu z databáze podle specifického ID
    global $connection;

    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_POST["id"];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $queryDelete = "DELETE FROM users WHERE id = $id";
    $resultDelete = mysqli_query($connection, $queryDelete);

    if(!$resultDelete) {
        echo "něco je špatně";
    }
}
?>