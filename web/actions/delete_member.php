<?php

include '../include.php';


if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $member = spustit_SQL($db, "DELETE FROM staff WHERE id='$id' ");

    odkaz_zprava('sprava_clenu.php', 'Uspěšně smazáno.');
}



?>