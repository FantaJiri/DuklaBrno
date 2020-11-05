<?php

include '../include.php';


if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $member = spustit_SQL($db, "DELETE FROM races WHERE id='$id' ");

    odkaz_zprava('sprava_zavodu.php', 'Uspěšně smazáno.');
}



?>
