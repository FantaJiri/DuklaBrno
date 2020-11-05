<?php

include '../include.php';


if ($_POST && $_POST['name'] && $_POST['password'] && $_POST['password_znova'])
{
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);
    $password_znova = htmlspecialchars($_POST['password_znova']);

    $user = spustit_SQL($db, "SELECT * FROM users WHERE name='$name' ");

    if (count($user)) {
        odkaz('register.php', "Uživatel již existuje!");
    } else { 
        if ($password == $password_znova)
        {
            spustit_SQL($db, "INSERT INTO users (name, password, role) VALUE ('$name', '$password', 'user') ");
            
            odkaz_zprava('index.php', 'Uspěšně registrován.');
        } else {
            odkaz('register.php', "Neshodná hesla!");
        }
    }
    
}



?>