<?php

include("config.php");

$code = $_POST['code'];
$domaine = $_POST['domaine'];
$titre = $_POST['titre'];
$quartier = $_POST['quartier'];
$prix = $_POST['prix'];
$description = $_POST['description'];

$sql = "INSERT INTO offres
(
auteur_code,
domaine,
titre,
quartier,
prix,
description
)
VALUES
(
'$code',
'$domaine',
'$titre',
'$quartier',
'$prix',
'$description'
)";

mysqli_query($conn,$sql);

echo "success";

?>