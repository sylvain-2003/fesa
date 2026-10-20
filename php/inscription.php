<?php
include 'config.php';

$code        = trim($_POST['code'] ?? '');
$nom         = trim($_POST['nom'] ?? '');
$nationalite = trim($_POST['nationalite'] ?? '');
$telephone   = trim($_POST['telephone'] ?? '');
$quartier    = trim($_POST['quartier'] ?? '');
$type        = trim($_POST['type'] ?? '');

if ($code === '' || $nom === '' || $telephone === '') {
    echo "Erreur : champs obligatoires manquants";
    exit;
}

$stmt = mysqli_prepare($conn,
    "INSERT INTO utilisateurs (code_id, nom, nationalite, telephone, quartier, type_acteur)
     VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssss", $code, $nom, $nationalite, $telephone, $quartier, $type);

if (mysqli_stmt_execute($stmt)) {
    echo "Utilisateur enregistré";
} else {
    echo "Erreur : impossible d'enregistrer l'utilisateur";
}