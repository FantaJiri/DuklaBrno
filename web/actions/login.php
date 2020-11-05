<?php

include '../include.php';


if ($_POST && $_POST['name'] && $_POST['password'])
{
    $name = $_POST['name'];
    $password = $_POST['password'];

    $user = spustit_SQL($db, "SELECT * FROM users WHERE name='$name' ");
    // [ ['amdin'] ]
    //      0

    if (count($user)) {
        $user = $user[0];
        if ($user['password'] == $password)
        {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            odkaz_zprava('index.php', 'Uspěšně přihlášen.');
        } else {
            odkaz('login.php', "Nesprávné heslo!");
        }
    } else {
        odkaz('login.php', "Nesprávné údaje!");
    }
    
}



?>