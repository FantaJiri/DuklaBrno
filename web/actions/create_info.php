<?php

include '../include.php';


if ($_POST && $_POST['name'] && $_POST['text'] && $_POST['role'])
{
    $name = $_POST['name'];
    $text = $_POST['text'];
    $role = $_POST['role'];

    $info = spustit_SQL($db, "SELECT * FROM info WHERE name='$name' ");

    if (count($info)) {
        odkaz('sprava_info.php', "Info již existuje!");
    } else { 
        spustit_SQL($db, "INSERT INTO info (name, text, role) VALUE ('$name', '$text', '$role') ");
        
        odkaz_zprava('sprava_info.php', 'Info přidáno.');
    }
}



?>