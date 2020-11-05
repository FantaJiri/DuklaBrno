<?php

include '../include.php';
//var_dump($_POST); die;

if ($_POST && $_POST['name'] && $_POST['rider'] && $_POST['time'] && $_POST['placement'])
{
    $name = $_POST['name'];
    $rider = $_POST['rider'];
    $time = $_POST['time'];
    $placement = $_POST['placement'];

    
   
        spustit_SQL($db, "INSERT INTO races (name, rider_id, time, placement) VALUE ('$name', '$rider', '$time', $placement) ");
        
        odkaz_zprava('sprava_zavodu.php', 'Člen přidán.');
    
} else {
    odkaz_zprava('sprava_zavodu.php', 'Zadej všechny údaje');
}

