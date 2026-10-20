<?php
header('Content-Type: application/json');
include("config.php");

$code = trim($_POST['code'] ?? '');

if ($code === '') {
    echo json_encode(["success" => false, "message" => "Code non fourni"]);
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT * FROM utilisateurs WHERE code_id = ?");
mysqli_stmt_bind_param($stmt, "s", $code);
mysqli_stmt_execute($stmt);
$resultat = mysqli_stmt_get_result($stmt);

if ($utilisateur = mysqli_fetch_assoc($resultat)) {
    echo json_encode([
        "success"     => true,
        "code"        => $utilisateur["code_id"],
        "nom"         => $utilisateur["nom"],
        "nationalite" => $utilisateur["nationalite"],
        "telephone"   => $utilisateur["telephone"],
        "quartier"    => $utilisateur["quartier"],
        "type"        => $utilisateur["type_acteur"]
    ]);
} else {
    echo json_encode(["success" => false]);
}