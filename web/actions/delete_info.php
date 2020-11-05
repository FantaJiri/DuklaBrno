<?php

include '../include.php';


if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $info = spustit_SQL($db, "DELETE FROM info WHERE id='$id' ");

    odkaz_zprava('sprava_info.php', 'Uspěšně smazáno.');
}



?>