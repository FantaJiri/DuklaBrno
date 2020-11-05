<?php

include '../include.php';


if ($_POST && $_POST['password_stare'] && $_POST['password'] && $_POST['password_znova'])
{
    $password_stare = htmlspecialchars($_POST['password_stare']);
    $password = htmlspecialchars($_POST['password']);
    $password_znova = htmlspecialchars($_POST['password_znova']);

    $user = spustit_SQL($db, "SELECT * FROM users WHERE id=" . $logged_user['id']);

    $user = $user[0];
    if ($user['password'] == $password_stare)
    { 
        if ($password == $password_znova)
        {
            spustit_SQL($db, "UPDATE users SET password='$password' WHERE id=" . $logged_user['id']);
            
            odkaz_zprava('account.php', 'Heslo změněno.');
        } else {
            odkaz('account.php', "Neshodná hesla!");
        }
    } else {
        odkaz('account.php', "Nesprávné heslo!");
    }
    
}



?>