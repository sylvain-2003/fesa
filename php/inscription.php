<?php
header('Content-Type: application/json; charset=utf-8');
include 'config.php';

$code        = trim($_POST['code'] ?? '');
$nom         = trim($_POST['nom'] ?? '');
$nationalite = trim($_POST['nationalite'] ?? '');
$telephone   = trim($_POST['telephone'] ?? '');
$quartier    = trim($_POST['quartier'] ?? '');
$type        = trim($_POST['type'] ?? '');

if ($code === '' || $nom === '' || $telephone === '') {
    echo json_encode(["success" => false, "message" => "Champs obligatoires manquants"]);
    exit;
}

$stmt = mysqli_prepare($conn,
    "INSERT INTO utilisateurs (code_id, nom, nationalite, telephone, quartier, type_acteur)
     VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssss", $code, $nom, $nationalite, $telephone, $quartier, $type);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["success" => true, "message" => "Utilisateur enregistré"]);
} else {
    echo json_encode(["success" => false, "message" => "Impossible d'enregistrer : " . mysqli_stmt_error($stmt)]);
}
