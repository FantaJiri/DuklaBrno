<?php

include '../include.php';


if ($_POST && $_POST['info'])
{
    $info = $_POST['info'];

    spustit_SQL($db, "UPDATE users SET info='$info' WHERE id=".$_GET['id']);
        
    odkaz_zprava('account.php', 'Komentář vložen.');
}

?>