<?php

include '../include.php';


if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $user = spustit_SQL($db, "DELETE FROM users WHERE id='$id' ");

    odkaz_zprava('sprava.php', 'Uspěšně smazán.');
}



?>