<?php

include("config.php");

$code = $_POST['code'];
$domaine = $_POST['domaine'];
$titre = $_POST['titre'];
$quartier = $_POST['quartier'];
$budget = $_POST['budget'];
$description = $_POST['description'];

$sql = "INSERT INTO demandes
(
auteur_code,
domaine,
titre,
quartier,
budget,
description
)
VALUES
(
'$code',
'$domaine',
'$titre',
'$quartier',
'$budget',
'$description'
)";

mysqli_query($conn,$sql);

echo "success";

?>