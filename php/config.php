<?php
// Aucune sortie (echo) ici : les scripts renvoient du JSON pur.
mysqli_report(MYSQLI_REPORT_OFF);

// Sur Render : les identifiants viennent des variables d'environnement.
// En local (XAMPP) : valeurs par défaut ci-dessous.
$host     = getenv('DB_HOST') ?: 'localhost';
$port     = (int)(getenv('DB_PORT') ?: 3306);
$database = getenv('DB_NAME') ?: 'fesa';
$user     = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$ssl      = getenv('DB_SSL') === '1';   // à mettre à 1 si votre base MySQL exige SSL

$conn = mysqli_init();
if ($ssl) {
    mysqli_ssl_set($conn, null, null, null, null, null);
}
$ok = @mysqli_real_connect(
    $conn, $host, $user, $password, $database, $port, null,
    $ssl ? MYSQLI_CLIENT_SSL : 0
);

if (!$ok) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Connexion à la base impossible : " . mysqli_connect_error()
    ]);
    exit;
}

mysqli_set_charset($conn, "utf8mb4");
