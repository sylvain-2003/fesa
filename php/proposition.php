<?php
include 'config.php';

$demande_id  = (int)($_POST['demande_id'] ?? 0);
$auteur_code = trim($_POST['auteur_code'] ?? '');
$auteur_nom  = trim($_POST['auteur_nom'] ?? '');
$auteur_tel  = trim($_POST['auteur_tel'] ?? '');
$message     = trim($_POST['message'] ?? '');

$stmt = mysqli_prepare($conn,
    "INSERT INTO propositions (demande_id, auteur_code, auteur_nom, auteur_tel, message) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "issss", $demande_id, $auteur_code, $auteur_nom, $auteur_tel, $message);

echo mysqli_stmt_execute($stmt) ? "success" : "error";
