<?php

// ===== LOCAL (XAMPP) =====
$host = "sql108.infinityfree.com";
$database = "if0_43156008_fesa";      // mets le nom exact de ta base (ex : fesa ou fesa_db)
$user = "if0_43156008";
$password = "Fosi1234";
 
$conn = mysqli_connect($host, $user, $password, $database);
 
if (!$conn) {
    http_response_code(500);
    die("Erreur de connexion à la base de données.");
}
 
mysqli_set_charset($conn, "utf8mb4");


?>