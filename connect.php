<?php
define("MYHOST", "sql301.infinityfree.com"); 
define("MYUSER", "if0_37458191"); 
define("MYPASS", "gnJ64i7tozL3k4i");
$base = "if0_37458191_library_DB";

$idcon = new mysqli(MYHOST, MYUSER, MYPASS, $base);

if ($idcon->connect_error) { 
    die("Erreur de connexion à la base de données : " . $idcon->connect_error);
}
mysqli_set_charset($idcon, 'utf8mb4');
?>
