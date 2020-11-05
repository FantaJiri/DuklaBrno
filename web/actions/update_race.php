<?php

include '../include.php';
//var_dump($_POST); die;

if ($_POST && $_POST['name'] && $_POST['rider'] && $_POST['time'] && $_POST['placement'])
{
    $name = $_POST['name'];
    $rider = $_POST['rider'];
    $time = $_POST['time'];
    $placement = $_POST['placement'];

    
   
        spustit_SQL($db, "UPDATE races SET name='$name', rider_id='$rider', time='$time',placement='$placement' WHERE id=" . $_GET['id']);
        
        odkaz_zprava('sprava_zavodu.php', 'Závod upraven.');
    
} else {
    odkaz_zprava('sprava_zavodu.php', 'Zadej všechny údaje');
}

