<?php

include '../include.php';


if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $koment = spustit_SQL($db, "UPDATE users SET info='' WHERE id='$id' ");

    odkaz_zprava('account.php', 'Uspěšně smazán.');
}


?>