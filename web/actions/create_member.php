<?php

include '../include.php';


if ($_POST && $_POST['name'] && $_POST['info'] && $_POST['profile'] && $_POST['position'])
{
    $name = $_POST['name'];
    $info = $_POST['info'];
    $profile = $_POST['profile'];
    $position = $_POST['position'];

    $member = spustit_SQL($db, "SELECT * FROM staff WHERE name='$name' ");

    if (count($member)) {
        odkaz_zprava('sprava_clenu.php', "Člen již existuje!");
    } else { 
        spustit_SQL($db, "INSERT INTO staff (name, info, profile, position_id) VALUE ('$name', '$info', '$profile', $position) ");
        
        odkaz_zprava('sprava_clenu.php', 'Člen přidán.');
    }
} else {
    odkaz_zprava('sprava_clenu.php', 'Zadej všechny údaje');
}

