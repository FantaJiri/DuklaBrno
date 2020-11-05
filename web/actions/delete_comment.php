<?php

include '../include.php';


if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $koment = spustit_SQL($db, "DELETE FROM comments WHERE id='$id' ");

    odkaz_zprava('account.php', 'Uspěšně smazán.');
}


?>