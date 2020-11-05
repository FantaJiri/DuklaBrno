<?php

include '../include.php';

session_unset();
session_destroy();


odkaz_zprava('index.php', 'Uživatel odhlášen.');

?>