<?php
// Započne session
session_start();

// Zobrazování chyb
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Připojení do Databáze
$host = "localhost";
$username = "dukla";
$password = "Dukla123";
$database = "dukla";

$db = new mysqli($host, $username, $password, $database);

if ($db->connect_error){
    echo ("Chyba při připojení k databázi" .$db->connect_error); 
    die();
}

/* spojeni PDO a počítadlo návštěv PDO

$nastaveni = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

$spojeni = new PDO("mysql:host=localhost;dbname=dukla", 'dukla', 'Dukla123', $nastaveni);

$dotaz = $spojeni->prepare('INSERT INTO `view` (`ip`, `datum`) VALUES (?, ?)');
$parametry = array($_SERVER['REMOTE_ADDR'], time());
$dotaz->execute($parametry); */

// Pomocná funkce na vykonání SQL
function spustit_SQL($conn, $sql)
{
    $result = $conn->query($sql);
    if (!$result) {
        die( $conn->error );
    }
    if ($result === true) {
       return true;
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Pomozná funkce na redirect
function odkaz($stranka, $error="")
{
    if (empty($error)) {
        header("Location: ../$stranka");
    }else {
        header("Location: ../$stranka?error=" . urlencode($error));
    }
}

// Pomozná funkce na redirect
function odkaz_zprava($stranka, $zprava)
{
    header("Location: ../$stranka?zprava=" . urlencode($zprava));
}

function zobraz_zpravu()
{
    if (isset($_GET['zprava'])) {
        $zprava = $_GET['zprava'];
        return "<div style='position: fixed; top: 10px; right: 20px; z-index: 1030;' class='alert alert-success alert-dismissible fade show' role='alert'> $zprava   <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>";
    }
    return "";
}

// Získání chyb
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}


// Zpracování přihlášeného uživatele
if (isset($_SESSION['user_id']))
{
    $logged_user = spustit_SQL($db, "SELECT * FROM users WHERE id=". $_SESSION['user_id'])[0];
} else {
    $logged_user = false;
}


// Zobrazení statických informací
function zobraz_info($db, $name)
{
    $info = spustit_SQL($db, "SELECT * FROM info WHERE name='$name' ");
    if (empty($info)) {
        return;
    }
    $info = $info[0];
    $result = $info['text'];

    if (isset($_SESSION['user_id']))
    {
        $logged_user = [
            "id" => $_SESSION['user_id'],
            "name" => $_SESSION['user_name'],
            "role" => $_SESSION['user_role'],
        ];
    } else {
        $logged_user = false;
    }

    if ($info['role'] == 'user' && !$logged_user) {
        $result = "";
    }
    if ($info['role'] == 'admin' && ( !$logged_user || $logged_user['role'] != 'admin' ) ) {
        $result = "";
    }

    echo $result;
}

