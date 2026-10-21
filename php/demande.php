<?php
include 'config.php';

$code        = trim($_POST['code'] ?? '');
$domaine     = trim($_POST['domaine'] ?? '');
$titre       = trim($_POST['titre'] ?? '');
$quartier    = trim($_POST['quartier'] ?? '');
$budget      = trim($_POST['budget'] ?? '');
$description = trim($_POST['description'] ?? '');

$stmt = mysqli_prepare($conn,
    "INSERT INTO demandes (auteur_code, domaine, titre, quartier, budget, description) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssss", $code, $domaine, $titre, $quartier, $budget, $description);

echo mysqli_stmt_execute($stmt) ? "success" : "error";
