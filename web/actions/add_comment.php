<?php

include '../include.php';


if ($_POST && $_POST['text'])
{
    $comment = htmlspecialchars($_POST['text']);
    $user_id = htmlspecialchars($_GET['id']);
    

    spustit_SQL($db, "INSERT comments (text, user_id) VALUES ('$comment', '$user_id')");
        
    odkaz_zprava('account.php', 'Komentář vložen.');
}

?>