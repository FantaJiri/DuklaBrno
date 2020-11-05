<?php

include '../include.php';


if ($_POST && $_POST['name'] && $_POST['text'] && $_POST['role'])
{
    $name = $_POST['name'];
    $text = $_POST['text'];
    $role = $_POST['role'];

    spustit_SQL($db, "UPDATE info SET  name='$name', text='$text', role='$role' WHERE id=".$_GET['id']);
        
    odkaz_zprava('sprava_info.php', 'Info změněno.');
}

?>